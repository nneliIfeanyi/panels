<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Add User / Register
    public function register($data){
      // Prepare Query
      $this->db->query('INSERT INTO users (name, email, photo, password) 
      VALUES (:name, :email, :photo, :password)');

      // Bind Values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':photo', $data['photo']);
      $this->db->bind(':password', $data['password']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Get all users
    public function allUsers(){
      $this->db->query("SELECT * FROM users");

      $results = $this->db->resultset();

      return $results;
    }

    // Get searched users
    public function searchUsers($search_input){
      $this->db->query("SELECT * FROM users WHERE name LIKE '%$search_input%' ");

      $results = $this->db->resultset();

      return $results;
    }

    // Find USer BY Email
    public function findUserByEmail($email){
      $this->db->query("SELECT * FROM users WHERE email = :email");
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      //Check Rows
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }


    // Find USer BY Username
    public function findUserByUsername($username){
      $this->db->query("SELECT * FROM users WHERE name = :username");
      $this->db->bind(':username', $username);

      $row = $this->db->single();

      //Check Rows
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    // Login / Authenticate User
    public function login($email, $password){
      $this->db->query("SELECT * FROM users WHERE email = :email");
      $this->db->bind(':email', $email);

      $row = $this->db->single();
      
      $hashed_password = $row->password;
      if(password_verify($password, $hashed_password)){
        return $row;
      } else {
        return false;
      }
    }

    // Find User By ID
    public function getUserById($id){
      $this->db->query("SELECT * FROM users WHERE id = :id");
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

    // Update user without photo change
    public function update($data){
      // Prepare Query
      $this->db->query('UPDATE users SET phone = :phone, region = :region, address = :address WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':region', $data['region']);
      $this->db->bind(':address', $data['address']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function edit_pic($data){
      // Prepare Query
      $this->db->query('UPDATE users SET photo = :img WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':img', $data['image']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }