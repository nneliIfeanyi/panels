<?php
  class Profiles extends Controller{
    private $userModel;

    public function __construct(){
     // Load Models
      //$this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');
    }

    // Load Homepage
    public function index($id){
    $user = $this->userModel->getUserById($id);
    //Set Data
    $data = [
        'user' => $user,
    ];

      // Load homepage/index view
      $this->view('profiles/index', $data);
    }

    public function complete($id){

      // Check if POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [ 
          'id' => $_SESSION['user_id'],      
          'phone' => trim($_POST['phone']),
          'region' => trim($_POST['region']),
          'address' => trim($_POST['address']),              
        ];

        $this->userModel->update($data);
        flash('profile_msg', 'Update Successfull...');
        redirect('profiles/'.$id);

      } else {
        // If NOT a POST

        // Init data
        $data = [
          'email' => '',
        ];

        // Load View
        $this->view('users/profile', $data);
      }
    }


    public function update_pic(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $uploadPath = "pics/";
          $fileName = basename($_FILES["picture"]["name"]); 
          $db_image_file =  $uploadPath . $fileName; 
          $imageUploadPath = $uploadPath . $fileName; 
          $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION); 
             
          // Allow certain file formats 
          $allowTypes = array('jpg','png','jpeg'); 

          if(!in_array($fileType, $allowTypes)){ 
            
             flash('profile_msg', 'INVALID IMAGE TYPE');
             redirect('users/update_pic');
             
              
          }else{ 
              $imageTemp = $_FILES["picture"]["tmp_name"]; 
               
              $data = [
                'id' => $_SESSION['user_id'],
                'image' => $db_image_file,
              ]; 

              if($this->userModel->edit_pic($data)){
                // Compress size and upload image 
                compressImage($imageTemp, $imageUploadPath, 9); 
                flash('profile_msg', 'Update Successfull');
                redirect('profiles/'.$_SESSION['user_id']);
              } else {
                die('Something went wrong');
              }

          }

        }else{ 

        //NOT A POST REQUEST
         // $user =$this->userModel->userLevel();
          $data = [
           
          ];
           
          $this->view('users/update_pic', $data);
        }

  }

}