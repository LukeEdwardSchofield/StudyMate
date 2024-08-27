<?php


require "../fn.php";


spl_autoload_register(function ($class){
    //Needed because with namespace, $class = Core\Database
    //We need it to be Core/Database
    $class = str_replace('\\', "/", $class);

    require "../$class.php";
});



require "../core/router.php";
