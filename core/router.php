<?php 
//parse url to only path so that any query does not get processed
$routes = require base_path("routes.php");

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

route($uri, $routes);

function route($uri, $routes){
    if(array_key_exists($uri, $routes)){
        require $routes[$uri];
    } else {
            abort(404);
        }
}

function abort($statusCode = 404){
        http_response_code($statusCode);

        require base_path("./views/{$statusCode}.views.php");

        die();
}

?>