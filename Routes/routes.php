<?php


/*
    Here you can create your own routes.
    Route example:
        $Route->new_route('page/page', 'Controller@method');
    To add a parameter to a route you need to do this:
        $Route->new_route('page/page/{param}', 'Controller@method'); 
    You can add only one param and need to be at the final of the route name
    The param will serve as the method parameter and must have the same name as the parameter of the method
*/ 


$Route = new Route;


// Home route
$Route->new_route('/Framework', 'HomeController@showFirstPage');

// Post routes
$Route->new_route('/Framework/posts', 'PostsController@showAll');
$Route->new_route('/Framework/posts/show/{id}', 'PostsController@show');
$Route->new_route('/Framework/posts/create', 'PostsController@create');
$Route->new_route('/Framework/posts/store', 'PostsController@store');
$Route->new_route('/Framework/posts/edit/{id}', 'PostsController@edit');
$Route->new_route('/Framework/posts/update/{id}', 'PostsController@update');
$Route->new_route('/Framework/posts/delete/{id}', 'PostsController@delete');


// Auth routes

$Route->new_route('/Framework/register', 'AuthController@create');
$Route->new_route('/Framework/store', 'AuthController@store');
$Route->new_route('/Framework/login', 'AuthController@loginForm');
$Route->new_route('/Framework/checkLogin', 'AuthController@login');
$Route->new_route('/Framework/logout', 'AuthController@logout');