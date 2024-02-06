<?php
  class Users extends Controller{
    private $userModel;
    private $postModel;
    
    public function __construct(){

      $this->userModel = $this->model('User');
      $this->postModel = $this->model('Post');
    }

    public function index(){
      if(!isset($_SESSION['user_id'])){
        redirect('users/login');
      }
      if (isset($_POST['search']) ){
      
         $search_input = trim($_POST['search']);

         $users = $this->userModel->searchUsers($search_input);

          $data = [
          'title'=> 'Showing search results for "'.$search_input.'"',
          'all_users' => $users
        ];
      
        $this->view('users/index', $data); 
      }//end if a search request
      else{

        $users = $this->userModel->allUsers();
        //Set Data
        $data = [
          'title'=> 'Users',
          'all_users' => $users
        ];

        // Load homepage/index view
        $this->view('users/index', $data);

      }
      
    }

    public function profile($id){
      if(!isset($_SESSION['user_id'])){
        redirect('users/login');
      }
      $states = $this->postModel->getStates();
      $user = $this->userModel->getUserById($id);
      //Set Data
      $data = [
        'user' => $user,
        'states' => $states
      ];

      // Load homepage/index view
      $this->view('users/profile', $data);
    }


// User Registration With Parsley And Ajax
    public function register(){
      // Check if logged in
      if($this->isLoggedIn()){
        redirect('posts');
      }

     if(!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['password'])){

        $data = [
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'photo' => 'img/avatar_guy.png'
        ];
        //validate Username..
        if ($this->userModel->findUserByUsername($data['name'])) {
          
           echo '
                  <div class="alert alert-danger">
                    User name already taken..
                  </div>
                ';
        }
        //Validate Email..
        elseif ($this->userModel->findUserByEmail($data['email'])) {
          
           echo '
                  <div class="alert alert-danger">
                    Email already taken..
                  </div>
                ';
        }else{
          // Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
          //All validation passed...
          $success = $this->userModel->register($data);
          if ($success) {
            $redirect = URLROOT.'/users/login';
            echo '
                  <div class="alert alert-success">
                    Registration Successfull, Redirecting to login..  <span class="spinner-border spinner-border-sm"> </span>
                  </div>
                  <meta http-equiv="refresh" content="4; $redirect">
                ';
            
          }else{
            echo '
                  <div class="alert alert-success">
                    Something went wrong... Try again later
                  </div>
                  
                ';
          }

        }
  
      } else {
        // If NOT a POST

        // Init data
        $data = [
          'name' => '',
          'email' => '',
          'password' => '',
        ];
      $this->view('users/register', $data);
      }
    }

    //User Login Method All Server Side Validation
    public function login(){
      // Check if logged in
      if($this->isLoggedIn()){
        redirect('posts');
      }

      // Check if POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [       
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),        
          'email_err' => '',
          'password_err' => '',       
        ];

        // Check for email
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter email.';
        }

        // Check for user
        if($this->userModel->findUserByEmail($data['email'])){
          // User Found
        } else {
          // No User
          $data['email_err'] = 'This email is not registered.';
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){

          // Check and set logged in user
          $loggedInUser = $this->userModel->login($data['email'], $data['password']);

          if($loggedInUser){
            // User Authenticated!
            setcookie('id', $loggedInUser->id, time()+(86400*15), '/');
            setcookie('name', $loggedInUser->name, time()+(86400*15), '/');
            setcookie('email', $loggedInUser->email, time()+(86400*15), '/');
            redirect('posts');
          } else {
            $data['password_err'] = 'Password incorrect.';
            // Load View
            $this->view('users/login', $data);
          }
           
        } else {
          // Load View
          $this->view('users/login', $data);
        }

      } else {
        // If NOT a POST

        // Init data
        $data = [
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',
        ];

        // Load View
        $this->view('users/login', $data);
      }
    }

    public function assets($id){
      if(!isset($_SESSION['user_id'])){
        redirect('users/login');
      }
      $assets = $this->postModel->getAssets($id);
      $user = $this->userModel->getUserById($id);
      //Set Data
      $data = [
        'assets' => $assets,
        'user' => $user
      ];

      // Load homepage/index view
      $this->view('users/assets', $data);
    }

    public function update_pic(){
      if(!isset($_SESSION['user_id'])){
        redirect('users/login');
      }
      $user = $this->userModel->getUserById($_SESSION['user_id']);
      //Set Data
      $data = [
        'user' => $user
      ];

      // Load homepage/index view
      $this->view('users/update_pic', $data);
    }

    // Create Session With User Info
    // public function createUserSession($user){
    //   session_destroy();
    //   //Set the session timeout for about a month
    //   $timeout = 2628002;

    //   //Set the maxlifetime of the session
    //   ini_set( "session.gc_maxlifetime", $timeout );

    //   //Set the cookie lifetime of the session
    //   ini_set( "session.cookie_lifetime", $timeout );
    //   session_start();
    //   $_SESSION['user_id'] = $user->id;
    //   $_SESSION['user_email'] = $user->email; 
    //   $_SESSION['user_name'] = $user->name;
    //   $name = $_SESSION['user_name'];
    //   $name = session_name();
    //   if(isset( $_COOKIE[ $name ] )) {
    //       setcookie( $name, $_COOKIE[ $name ], time() + $timeout, '/' );

    //       redirect('posts');
    //   } else {
    //      redirect('users/login');
    //   }
    // }

    // Logout & Destroy Session
    public function logout(){
      setcookie('id', $loggedInUser->id, time()-(86400*15), '/');
      setcookie('name', $loggedInUser->name, time()-(86400*15), '/');
      setcookie('email', $loggedInUser->email, time()-(86400*15), '/');
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy();
      redirect('users/login');
    }

    // Check Logged In
    public function isLoggedIn(){
      if(isset($_SESSION['user_id'])){
        return true;
      } else {
        return false;
      }
    }
  }