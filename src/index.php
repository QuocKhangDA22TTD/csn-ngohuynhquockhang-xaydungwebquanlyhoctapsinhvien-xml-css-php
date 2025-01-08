<?php

require './Core/Database.php';
require './Models/BaseModel.php';
require './Controllers/BaseController.php';

if(isset($_REQUEST['controller'])) {
    $controller = $_REQUEST['controller'];
} else {
    $controller = 'home';
}

if(isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
} else {
    $action = 'index';
}

$controllerName = ucfirst(strtolower($controller)).'Controller';
$actionName = strtolower($action);

require "./Controllers/${controllerName}.php";

$controllerObject = new $controllerName;
$controllerObject->$actionName();

