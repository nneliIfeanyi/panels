<?php
  class Pages extends Controller{
    public function __construct(){
     
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