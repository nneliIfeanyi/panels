<?php
  class Home extends Controller{
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
        'description' => 'We Buy.. We Fix.. We Sell..'
      ];

      // Load homepage/index view
      $this->view('home/index', $data);
    }

   
    public function market_place(){
      //Set Data
      $data = [
        'version' => '1.2.0'
      ];

      // Load marketplace view
      $this->view('home/market_place', $data);
    }
  }