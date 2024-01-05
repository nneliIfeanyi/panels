<?php
  class Posts extends Controller{
    private $userModel;
    private $postModel;
    public function __construct(){
      if(!isset($_SESSION['user_id'])){
        redirect('users/login');
      }
      // Load Models
      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');
    }

    // Load All Posts
    public function index(){
      $posts = $this->postModel->getPosts();

      $data = [
        'posts' => $posts
      ];
      
      $this->view('posts/index', $data);
    }

    // Show Single Post
    public function show($id){
      $post = $this->postModel->getPostById($id);
      $user = $this->userModel->getUserById($post->user_id);

      $data = [
        'post' => $post, 
        'user' => $user
      ];

      $this->view('posts/show', $data);
    }

    // Add Post
    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $photo = basename($_FILES["photo"]["name"]);
        if ($photo) {
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
            'body' => trim($_POST['body']),
            'user_id' => $_SESSION['user_id'],   
            'photo_err' => '',
            'body_err' => '',
          ];

       
          // Validate image format
          if($extension != 'png' && $extension != 'jpg'){
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
              flash('post_added', 'Post Added');
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
              'user_id' => $_SESSION['user_id'],
              'body_err' => '',
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
                move_uploaded_file($photo_tmp, $file_path2);
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
        $data = [
          'user' => $user,
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
          'body' => trim($_POST['body']),
          'user_id' => $_SESSION['user_id'],
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
              'body' => trim($_POST['body']),
              'user_id' => $_SESSION['user_id'],  
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
          'photo' => $post->post_img,
          'body' => $post->body,
        ];

        $this->view('posts/edit', $data);
      }
    }

    // Delete Post
    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Execute
        if($this->postModel->deletePost($id)){
          // Redirect to login
          flash('post_message', 'Post Removed');
          redirect('posts');
          } else {
            die('Something went wrong');
          }
      } else {
        redirect('posts');
      }
    }
  }