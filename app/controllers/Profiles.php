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

  }