<?php  
$config = require "../config.php";

require "../core/database.php";

$database = new Database($config["database"]);

$currentUser = 1;

 $tasks = $database->query("SELECT * FROM tasks",[
                           "current_user" => $currentUser])->fetchAll();

require "../views/tasks.views.php";