<?php
 
class AuthView {
     
    public static function showRegisterForm(){
        $output = '';
        $output .= '<link rel="stylesheet" href="/Framework/Resources/css/style.css">';
        $output .= '<div class="form">';
        $output .= '<form action="/Framework/store" method="POST" autocomplete="off">';
        $output .= '<input type="text" name="username" placeholder="Insert a username" required ><br>';
        $output .= '<input type="password" name="password" placeholder="Insert a password" id="pass" required ><br>';
        $output .= '<button type="button" onclick="show_hide()">Show/Hide</button>';
        $output .= '<button type="submit">Submit</button>';
        $output .= '</form><br>';   
        $output .= '<p>Already have a account?</p><a href="/Framework/login">Log in</a>'; 
        $output .= '</div>';    
        $output .= '<script src="/Framework/Resources/js/pass.js"></script>';
        echo $output;
    }

    public static function showLoginForm(){
        $output = '';
        $output .= '<link rel="stylesheet" href="/Framework/Resources/css/style.css">';
        $output .= '<div class="form">';
        $output .= '<form action="/Framework/checkLogin" method="POST" autocomplete="off">';
        $output .= '<input type="text" name="username" placeholder="Insert a username" required ><br>';
        $output .= '<input type="password" name="password" placeholder="Insert a password" id="pass" required ><br>';
        $output .= '<button type="button" onclick="show_hide()">Show/Hide</button>';
        $output .= '<button type="submit">Submit</button>';
        $output .= '</form>';
        $output .= '<p>Don\'t have a account?</p><a href="/Framework/register">Sing up</a>'; 
        $output .= '</div>';
        $output .= '<script src="/Framework/Resources/js/pass.js"></script>';
        echo $output;
    }

}
