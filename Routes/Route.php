<?php

class Route{
    private $routes = array();

    public function new_route($url, $action){
        $this->routes[$url] = $action;
    }

    public function process_url($requested_url){
        $url_find = 0;
        foreach($this->routes as $i => $v ) {
             if($i ==  $requested_url || $i.'/' ==  $requested_url) {
                    $class_and_function = explode('@', $v);
                    require_once('Controller/'.$class_and_function[0].'.php');
                    $obj = new $class_and_function[0];
                    $obj->{$class_and_function[1]}();
                    $url_find = 1;
                    break;
                } else if($pos_1 = strpos($i, '{') !== false ) {
                    $pos_1 = strpos($i, '{');
                    $pos_2 = strpos($i, '}');
                    $param_name = substr($i, $pos_1+1, $pos_2-$pos_1-1);
                    
                    $i = str_replace('{'.$param_name.'}', '', $i); 
                    $param_value = str_replace($i, '', $requested_url);
                    $array = str_split($param_value);
                    $count = 0;
                    foreach ($array as  $value) {
                        if($value == '/') {
                            $count++;
                        }
                    }
                   
                if($count <= 1){
                        $index = count($array);
                        if($array[$index-1] == '/' || $count === 0) {
                                 $param_value = str_replace('/', '', $param_value);

                                 $class_and_function = explode('@', $v);
                                 require_once('Controller/'.$class_and_function[0].'.php');
                             
                                  $r = new ReflectionMethod($class_and_function[0], $class_and_function[1]);
                                  $params = $r->getParameters();                
                                  foreach ($params as $param) {
                                      //$param is an instance of ReflectionParameter
                                     if($param->getName() == $param_name){
                                         $obj = new $class_and_function[0];
                                         $obj->{$class_and_function[1]}($param_value);
                                         $url_find = 1;
                                         break;
                                     } 
                                  }
                             

                        }
                }
                    
    
                    
                   
    
                }
            
        }
        if(!$url_find) {
            http_response_code(404);
        }
    }
}