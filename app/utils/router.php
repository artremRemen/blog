<?php

$routes = require './configs/routes.php';

$method = $_SERVER['REQUEST_METHOD']; //GET ou POST
$method_name = '_'.$method;
$action = $$method_name['action']?? 'default';
$resource = $$method_name['resource']??'default'; 

$route = array_filter($routes,fn($r)=>$method === $r['method'] 
                                   && $action === $r['action']  
                                 && $resource === $r['resource']);

$route = reset($route);

return $route;