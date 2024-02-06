<?php
  class Posts extends Controller{
    public $userModel;
    public $postModel;
    public function __construct(){
     if (!isset($_COOKIE['id']) AND !isset($_COOKIE['name']) AND !isset($_COOKIE['email']) ) {
        redirect('home');
      }else{
        $_SESSION['user_id'] = $_COOKIE['id'];
        $_SESSION['user_name'] = $_COOKIE['name'];
        $_SESSION['user_email'] = $_COOKIE['email'];
        flash('post_message', 'Login Successfull.. You are highly Welcome '.$_SESSION['user_name']);
      }
      // Load Models
      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');
    }

    // Load All Posts
    public function index(){

      if (isset($_POST['search']) ){
      
         $search_input = trim($_POST['search']);

         $posts = $this->postModel->searchPosts($search_input);

          $data = [
          'title'=> 'Showing search results for "'.$search_input.'"',

          'posts' => $posts
        ];
      
        $this->view('posts/index', $data); 

      }//end if a search request

      else{

          //load page normally  
            $posts = $this->postModel->getPosts();
            $data = [
              'title' => 'Posts',
              'posts' => $posts,
            ];
          
          $this->view('posts/index', $data);
          }
      
    }



    // Show Single Post
    public function show($id){
      $post = $this->postModel->getPostById($id);
      $user = $this->userModel->getUserById($post->user_id);
      $pull = $this->postModel->pull($id);
      $data = [
        'post' => $post, 
        'user' => $user,
        'likes' => $pull
      ];

      $this->view('posts/show', $data);
    }


    // Add Post
    public function add($category){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $photo = basename($_FILES["photo"]["name"]);
        if (!empty($photo)) {
          //.....
          $photo = basename($_FILES["photo"]["name"]);
          $photo_tmp = $_FILES['photo']['tmp_name'];
          $photo_size = $_FILES['photo']['size'];
          $file_path = "uploads/";
          $file_path2 =  $file_path . $photo;
          $db_img =  $file_path . $photo;
          $extension = pathinfo($file_path2, PATHINFO_EXTENSION);
          
          //.....
          $data = [
            'photo' => $db_img,
            'title' => trim($_POST['title']),
            'body' => trim($_POST['body']),
            'user_id' => $_SESSION['user_id'],
            'category' => $category, 
            'status' => 'off',  
            'photo_err' => '',
            'body_err' => '',
          ];

       
          // Validate image format
          if($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg' && $extension != 'gif'){
            $data['photo_err'] = 'Image format not supported..';
          }


          //validate body text
          if(empty($data['body'])){
              $data['body_err'] = 'Please enter the post body';
            }

          // Make sure there are no errors
          if(empty($data['photo_err']) && empty($data['body_err'])){
            // Validation passed...
            //Execute
            if($this->postModel->addPost($data)){
              move_uploaded_file($photo_tmp, $file_path2);
              //compressImage($source, $destination, $quality)
              // Redirect to login
              flash('post_message', 'Post Added');
              redirect('posts');
            } else {
              die('Something went wrong');
            }
          } else {
            // Load view with errors
            $this->view('posts/add', $data);
          }

        }//End if image upload

        else
          {
          //Not image upload
        
            $data = [
              'body' => trim($_POST['body']),
              'title' => trim($_POST['title']),
              'user_id' => $_SESSION['user_id'],
              'category' => $category,
              'status' => 'off',
              'photo' => '',
              'body_err' => '',
              'photo_err' => ''
            ];

            //validate body text
            if(empty($data['body'])){
                $data['body_err'] = 'Please enter the post body';
              }

            // Make sure there are no errors
            if(empty($data['body_err'])){
              // Validation passed...
              //Execute
              if($this->postModel->addPost2($data)){
                // Redirect to login
                flash('post_added', 'Post Added');
                redirect('posts');
              } else {
                die('Something went wrong');
              }
            } else {
              // Load view with errors
              $this->view('posts/add', $data);
            }
        }

      }//End if server request 

      else {
        //Not a post request
        $user = $this->userModel->getUserById($_SESSION['user_id']);
        if (empty($user->region) || empty($user->phone) || empty($user->address)) {
          redirect('users/profile/'.$user->id);
        }
        $data = [
          'user' => $user,
          'category' => $category,
          'title' => '',
          'photo' => '',
          'photo_err' => '',
          'body' => '',
        ];

        $this->view('posts/add', $data);
      }
    }//End add post method


    // Edit Post
    public function edit($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $photo = basename($_FILES["photo"]["name"]);

        if ($photo) {
          $photo_tmp = $_FILES['photo']['tmp_name'];
          $photo_size = $_FILES['photo']['size'];
          $file_path = "uploads/";
          $file_path2 =  $file_path . $photo;
          $db_img =  $file_path . $photo;
          $extension = pathinfo($file_path2, PATHINFO_EXTENSION);

          $data = [
          'id' => $id,
          'photo' => $db_img,
          'title' => trim($_POST['title']),
          'body' => trim($_POST['body']),
          'user_id' => $_SESSION['user_id'],
          'status' => 'off',
          'photo_err' => '',   
          'body_err' => ''

          ];

          if($extension != 'png' && $extension != 'jpg'){
            $data['photo_err'] = 'Image format not supported..';
          }

          if(empty($data['body'])){
              $data['body_err'] = 'Please enter the post body';
            }

          if(empty($data['photo_err']) && empty($data['body_err'])){
            // Validation passed
            //Execute
            if($this->postModel->updatePost2($data)){
            move_uploaded_file($photo_tmp, $file_path2);
            flash('post_message', 'Post Updated Successfully..');
            redirect('posts');
            } else {
              die('Something went wrong');
            }
          } else {
            // Load view with errors
            $this->view('posts/edit', $data);
          }

        }else{
           $data = [
              'id' => $id,
              'title' => trim($_POST['title']),
              'body' => trim($_POST['body']),
              'user_id' => $_SESSION['user_id'], 
              'status' => 'off',
              'body_err' => ''

            ];

           if(empty($data['body'])){
            flash('post_message', 'No changes made, Text field cannot be empty..');
            redirect('posts');
          }else{
            if(empty($data['body_err'])){
              // Validation passed
              //Execute
              if($this->postModel->updatePost1($data)){
              // Redirect to login
              flash('post_message', 'Post Updated Successfully..');
              redirect('posts');
              } else {
                die('Something went wrong');
              }
            } else {
              // Load view with errors
              $this->view('posts/edit', $data);
            }
          }

        }

      } else {
        // Get post from model
        $post = $this->postModel->getPostById($id);

        // Check for owner
        if($post->user_id != $_SESSION['user_id']){
          redirect('posts');
        }

        $data = [
          'id' => $id,
          'post' => $post,
          'photo' => $post->post_img,
          'body' => $post->body,
          'price' =>$post->price
        ];

        $this->view('posts/edit', $data);
      }
    }

    // Delete Post
    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Execute
        if($this->postModel->deletePost($id)){
          
          $this->postModel->delete_post_likes($id);
          flash('post_message', 'Post Removed', 'alert alert-danger');
          redirect('posts');
          } else {
            die('Something went wrong');
          }
      } else {
        redirect('posts');
      }
    }


    //Post likes
    public function likes($id){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          $data=[
            'post_id' => $id,
            'user_id' => $_SESSION['user_id'],
            'user_name' => $_SESSION['user_name']
          ];

          if ($this->postModel->checkLike($id))
          {
            flash('like_msg', 'You already liked this post');
            redirect('posts/show/'.$id);
          }
          else
          {
            $this->postModel->putLike($data);
            flash('like_msg', 'liked');
            redirect('posts/show/'.$id);
          }
        

      }else{

        $pull = $this->postModel->pull($id);

        $data = [
          'likes' => $pull, 
        ];

        $this->view('posts/show', $data);
        }
    }

    // Delete Post likes
    public function unlike($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        if (!$this->postModel->checkLike($id)) {
          flash('like_msg', 'You already unliked this post');
          redirect('posts/show/'.$id);
        }else{
        //Execute
          if($this->postModel->deleteLike($id)){
           
            flash('like_msg', 'Post Unliked..');
            redirect('posts/show/'.$id);
            } else {
              die('Something went wrong');
            }
        }
      } else {
        redirect('posts');
      }
    }
  }