<?php
 
class HomeView {
     public static function firstPage(){
         $output = '';
         $output .= '<link rel="stylesheet" href="/Framework/Resources/css/style.css">';
         $output .= '<div class="content">';
         $output .= '<h1>My project</h1>';
         $output .= '<div class="info">';
         if(isset($_SESSION['username'])) {
            $output .= '<p>You are login as '.$_SESSION['username'].'</p>';
            $output .= '<div class="links">';
            $output .= '<a href="logout" class="logout">Log out</a>';
            $output .= '<a href="posts">Posts</a>';
         } else {
            $output .= '<div class="links">';
            $output .= '<a href="register">Register</a>';
            $output .= '<a href="login">Log in</a>';
         }
         $output .= '</div>';
         $output .= '</div>';
         $output .= '</div>';
         echo $output;
     }
}
