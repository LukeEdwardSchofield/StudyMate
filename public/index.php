
<link rel="stylesheet" href="style.css">
<a href="/StudyMate/test">Test</a>

<?php 
use Core\Validator;

//points outside the public directory to make other files accessible
const BASE_PATH = __DIR__ . '/../';

require  BASE_PATH . "core/fn.php";


/*
whenever a class is used, and its location is unknown, 
or it is not required/included, this function loads it automatically
*/
spl_autoload_register(function ($class){
    
    require base_path($class . ".php");
});

require base_path("core/router.php");



?>



