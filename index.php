<?php 

require_once('Routes/Route.php');
require_once('Routes/routes.php');

$Route->process_url($_SERVER['REQUEST_URI']);
