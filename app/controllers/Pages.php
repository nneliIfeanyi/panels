<?php
  class Pages extends Controller{
    public function __construct(){
     
    }

    // Load Homepage
    public function index(){
      // If logged in, redirect to posts
      if(isset($_SESSION['user_id'])){
        redirect('posts');
      }

      //Set Data
      $data = [
        'title' => 'Welcome To Panels',
        'description' => 'A GSM Engineering Community'
      ];

      // Load homepage/index view
      $this->view('pages/index', $data);
    }

    public function about(){
      //Set Data
      $data = [
        'version' => '1.2.0'
      ];

      // Load about view
      $this->view('pages/about', $data);
    }
  }