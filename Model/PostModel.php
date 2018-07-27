<?php

require_once("Model/GeneralModel.php");
 
class PostModel {
     public  function all() { 
        $db = GeneralModel::init_db();
        // Make the query for all posts
        $query = "SELECT * FROM posts";
        // Execute the query
        $posts = array();
        foreach ($db->query($query) as $key => $value) {
            $posts[] = $value;
        }
        return $posts;
     }

     public function show($id) {
         $db = GeneralModel::init_db();
         // Make the query for a single post
         $query = "SELECT * FROM posts WHERE id = :id";
         $stm = $db->prepare($query);
         $stm->execute(array(':id' => $id));
         $post = '';
         if($stm->rowCount() > 0) {
            $post = $stm->fetch(PDO::FETCH_ASSOC);
         }
         return $post;
     } 

     public function store(){
        $db = GeneralModel::init_db();
        $title = $_POST['title'];
        $body = $_POST['body'];
        $datetime = date("Y-m-d H:i:s");
        $query  = "INSERT INTO posts (title, body, author, post_date, likes, dislikes) 
                    VALUES (:title, :body, :username, :post_date, 0, 0)";
        $stm = $db->prepare($query);
        $stm->execute(array(':title' => $title, ':body' => $body, ':post_date' =>$datetime, ':username' => $_SESSION['username']));
        return header("location: ../posts");
     }

     public function update($id){

        $db = GeneralModel::init_db();
        $title = $_POST['title'];
        $body = $_POST['body'];
        $query = "UPDATE posts SET title = :title, body = :body
                  WHERE id = :id";
        $stm = $db->prepare($query);
        $stm->execute(array(':title' => $title, ':body' => $body, ':id' => $id));
        return header("location: ../../posts");
        
    }

    public function delete($id){ 
        $post = $this->show($id);
        $db = GeneralModel::init_db();  
        if($post['author'] == $_SESSION['username']) {
            $query_2 = "DELETE FROM posts WHERE id = :id";
            $stm_2 = $db->prepare($query_2);
            $stm_2->execute(array(':id' => $id));
            return header("location: ../../posts");
        } else {
            return header("location: /Framework");
        }
    }

    public function like($id) {
        $post = $this->show();
        $likes = $post['likes']+1;
        $db = GeneralModel::init_db();
        $query = "UPDATE posts SET likes = $likes WHERE id = :id";
        $stm = $db->prepare($query);
        $stm->execute(array('id' => 'id'));
    } 

    public function unlike($id) {
        $post = $this->show();
        $likes = $post['likes']-1;
        $db = GeneralModel::init_db();
        $query = "UPDATE posts SET likes = $likes WHERE id = :id";
        $stm = $db->prepare($query);
        $stm->execute(array('id' => 'id'));
    } 

    public function dislike($id) {
        $post = $this->show();
        $likes = $post['dislikes']+1;
        $db = GeneralModel::init_db();
        $query = "UPDATE posts SET likes = $likes WHERE id = :id";
        $stm = $db->prepare($query);
        $stm->execute(array('id' => 'id'));
    } 

    public function undislike($id) {
        $post = $this->show();
        $likes = $post['dislikes']-1;
        $db = GeneralModel::init_db();
        $query = "UPDATE posts SET likes = $likes WHERE id = :id";
        $stm = $db->prepare($query);
        $stm->execute(array('id' => 'id'));
    } 
    
}
