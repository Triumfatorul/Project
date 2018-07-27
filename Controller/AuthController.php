<?php
require_once('Model/AuthModel.php');
require_once('View/AuthView.php');


class AuthController {
    public function __construct(){
        session_start();
    }

     public function create(){
        if(!isset($_SESSION['user'])){
            AuthView::showregisterForm();
        }  else {
            return header("location: /Framework");
        }
         
     }

     public function store(){
         $AuthModel = new AuthModel;
         $AuthModel->store();
     }

     public function loginForm(){
        if(!isset($_SESSION['user'])){
            AuthView::showLoginForm();
        }  else {
            return header("location: /Framework");
        }
            
     
    }

     public function login(){
         $AuthModel = new AuthModel;
         $AuthModel->login(); 
     }

     public function logout(){
         session_destroy();
         header("location: /Framework/");
     }
}
