<?php
session_start();

require 'configs/config.php';


require DOCUMENT_ROOT.'/vendor/autoload.php';
$route = require './utils/router.php';
// Validator


$controller_name = 'Controllers\\'.$route['controller'];
$post_controller = new $controller_name();

$view = call_user_func([$post_controller, $route['callback']]);
include VIEWS_PATH.$view->name;