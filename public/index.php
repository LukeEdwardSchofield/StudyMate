<?php
use Core\Router;

require "../fn.php";

spl_autoload_register(function ($class){
    //Needed because with namespace, $class = Core\Database
    //We need it to be Core/Database
    $class = str_replace('\\', "/", $class);

    require "../$class.php";
});

$router =  new Router();
$routes = require "../routes.php";

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

$router->route($uri, $method);
