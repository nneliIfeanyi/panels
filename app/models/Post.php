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

    // Get Post By ID
    public function getPostById($id){
      $this->db->query("SELECT * FROM posts WHERE id = :id");

      $this->db->bind(':id', $id);
      
      $row = $this->db->single();

      return $row;
    }

    // Add Post
    public function addPost($data){
      // Prepare Query
      $this->db->query('INSERT INTO posts (post_img, user_id, body) 
      VALUES (:photo, :user_id, :body)');

      // Bind Values
      $this->db->bind(':photo', $data['photo']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':body', $data['body']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Add Post
    public function addPost2($data){
      // Prepare Query
      $this->db->query('INSERT INTO posts (user_id, body) 
      VALUES (:user_id, :body)');

      // Bind Values
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':body', $data['body']);
      
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
      $this->db->query('UPDATE posts SET post_img = :photo, body = :body WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':photo', $data['photo']);
      $this->db->bind(':body', $data['body']);
      
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
      $this->db->query('UPDATE posts SET body = :body WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':body', $data['body']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
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
  }