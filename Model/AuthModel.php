<?php
require_once('Model/GeneralModel.php');
 
class AuthModel {
    
    public function store(){
        $db = GeneralModel::init_db();
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $date = date("Y-m-d H:i:s");

        $query = "INSERT INTO users (username, pass, create_date)
                VALUES (:username, :pass, :create_date)";
          $stm = $db->prepare($query);
          $stm->execute(array(':username' => $username, ':pass' => $password, ':create_date' => $date));
        return header("location: /Framework/login");
    }

    public function login(){
        $db = GeneralModel::init_db();
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $query = "SELECT * FROM users WHERE username = :username AND pass = :pass";
        $stm = $db->prepare($query);
        $stm->execute(array(':username' => $username, ':pass' => $password));
        $rows_count = $stm->rowCount();
        
        if($rows_count > 0) {
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['username'] = $result['username'];
            $_SESSION['id'] = $result['id'];
            return header("location: /Framework/");
        } else {
            return header("location: /Framework/login");
        }

    }
}