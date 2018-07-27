<?php

require_once('Model/PostModel.php');
require_once('View/PostView.php');

class PostsController {

    public function __construct(){
        session_start();
        if(!isset($_SESSION['username'])){
            return header("location: /Framework/login");    
        }
    }

    public function showAll(){
        $PostModel = new PostModel;
        $posts = $PostModel->all();
        PostView::showAllPosts($posts); 
    }
    
    
    public function create() {
         PostView::showCreateForm();
    }

    public function store(){
        $PostModel = new PostModel;
        $posts = $PostModel->store();
    }

    public function show($id) {
        $PostModel = new PostModel;
        $post = $PostModel->show($id);
        PostView::show($post);
    }

    public function edit($id){
        $PostModel = new PostModel;
        $post = $PostModel->show($id);
        PostView::showEditForm($post);        
    }

    public function update($id){
        $PostModel = new PostModel;
        $post = $PostModel->update($id);     
    }

    public function delete($id){
        $PostModel = new PostModel;
        $post = $PostModel->delete($id);     
    }

    public function like($id){
        $PostModel = new PostModel;
        $post = $PostModel->like($id);   
    }

    public function unlike($id){
        $PostModel = new PostModel;
        $post = $PostModel->unlike($id);   
    }

    public function dislike($id){
        $PostModel = new PostModel;
        $post = $PostModel->dislike($id);   
    }

    public function undislike($id){
        $PostModel = new PostModel;
        $post = $PostModel->unlike($id);   
    }

}
