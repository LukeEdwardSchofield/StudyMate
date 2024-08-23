<?php  


//parse the url so that any query(after the ?) does not get process
$uri = parse_url($_SERVER['REQUEST_URI'])["path"];

$routes = require "../routes.php";

routeToController($uri, $routes);


function routeToController($uri, $routes)
{
    if(array_key_exists($uri, $routes))
      {
        require $routes[$uri];
      }
    else
      {
         abort();
      }
}

function abort($code = 404){

    require "../views/{$code}.views.php";
}