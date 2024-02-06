<?php
  class Post {
    private $db;
    
    public function __construct(){
      $this->db = new Database;
    }

    // Get All Posts
    public function getPosts(){
      $this->db->query("SELECT *, 
                        posts.id as postId, 
                        users.id as userId
                        FROM posts 
                        INNER JOIN users 
                        ON posts.user_id = users.id
                        ORDER BY posts.created_at DESC;");

      $results = $this->db->resultset();

      return $results;
    }

     // Get search results
    public function searchPosts($search_input){
      $this->db->query("SELECT *, posts.id as postId, 
                        users.id as userId
                        FROM posts 
                        INNER JOIN users 
                        ON posts.user_id = users.id
                        WHERE body LIKE '%$search_input%' ");

      $results = $this->db->resultset();

      return $results;
    }

     // Get all posts per user
    public function getAssets($id){
      $this->db->query("SELECT *, posts.id as postId, 
                        users.id as userId
                        FROM posts 
                        INNER JOIN users 
                        ON posts.user_id = users.id
                        WHERE user_id = :id");
      $this->db->bind(':id', $id);
      $results = $this->db->resultset();

      return $results;
    }

    // Get states
    public function getStates(){
      $this->db->query("SELECT * FROM states");
      
      $results = $this->db->resultset();

      return $results;
    }

    // Get Post By ID
    public function getPostById($id){
      $this->db->query("SELECT * FROM posts WHERE id = :id");

      $this->db->bind(':id', $id);
      
      $row = $this->db->single();

      return $row;
    }

    // Add Post with image
    public function addPost($data){
      // Prepare Query
      $this->db->query('INSERT INTO posts (post_img, user_id, body, title, category, price, status) 
      VALUES (:photo, :user_id, :body, :title, :category, :price, :status)');

      // Bind Values
      $this->db->bind(':photo', $data['photo']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':body', $data['body']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':category', $data['category']);
      $this->db->bind(':price', $data['title']);
      $this->db->bind(':status', $data['status']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Add Post without image
    public function addPost2($data){
      // Prepare Query
      $this->db->query('INSERT INTO posts (user_id, body,price, title, category, status) 
      VALUES (:user_id, :body, :price, :title, :category, :status)');

      // Bind Values
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':body', $data['body']);
      $this->db->bind(':price', $data['title']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':category', $data['category']);
      $this->db->bind(':status', $data['status']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Update Post with photo change
    public function updatePost2($data){
      // Prepare Query
      $this->db->query('UPDATE posts SET post_img = :photo, body = :body, price = :price, title = :title WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':photo', $data['photo']);
      $this->db->bind(':body', $data['body']);
      $this->db->bind(':price', $data['title']);
      $this->db->bind(':title', $data['title']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Update Post without photo change
    public function updatePost1($data){
      // Prepare Query
      $this->db->query('UPDATE posts SET body = :body, price = :price, title = :title WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':body', $data['body']);
      $this->db->bind(':price', $data['title']);
      $this->db->bind(':title', $data['title']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Check if like exist
    public function checkLike($id){
      $this->db->query("SELECT * FROM likes WHERE user_id = :u_id AND post_id = :p_id");

      $this->db->bind(':u_id', $_SESSION['user_id']);
      $this->db->bind(':p_id', $id);

      $row = $this->db->single();

      //Check Rows
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    //Put likes
    public function putLike($data)
    {
      $this->db->query('INSERT INTO likes (post_id, user_id, username) 
      VALUES (:p_id, :u_id, :username)');

      // Bind Values
      $this->db->bind(':p_id', $data['post_id']);
      $this->db->bind(':u_id', $data['user_id']);
      $this->db->bind(':username', $data['user_name']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    //pull
    public function pull($id){
      $this->db->query("SELECT * FROM likes WHERE post_id = :id");

      $this->db->bind(':id', $id);
      $results = $this->db->resultset();
      if ($this->db->rowCount() > 0) {
        return $this->db->rowCount();
      }
      
    }
    // Delete Post
    public function deletePost($id){
      // Prepare Query
      $this->db->query('DELETE FROM posts WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $id);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }


    // Delete all Posts per user, 
    //only triggered when a user deletes account
    public function deleteAllUserPosts($id){
      // Prepare Query
      $this->db->query('DELETE FROM posts WHERE user_id = :id');

      // Bind Values
      $this->db->bind(':id', $_SESSION['user_id']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Delete Post likes
    public function deleteLike($id){
      // Prepare Query
      $this->db->query('DELETE FROM likes WHERE user_id = :u_id AND post_id = :p_id');

      // Bind Values
      $this->db->bind(':p_id', $id);
      $this->db->bind(':u_id', $_SESSION['user_id']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }



    // Delete Post likes
    public function delete_post_likes($id){
      // Prepare Query
      $this->db->query('DELETE FROM likes WHERE post_id = :id');

      // Bind Values
      $this->db->bind(':id', $id);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }




  }