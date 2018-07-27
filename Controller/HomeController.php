<?php

require_once('View/HomeView.php');

class HomeController {

    public function __construct(){
        session_start();
    }

    public function showFirstPage() {
        HomeView::firstPage();
    }
}
