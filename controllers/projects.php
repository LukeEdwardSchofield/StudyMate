<?php  
$config = require "../config.php";

require "../core/database.php";

$database = new Database($config["database"]);

$currentUser = 1;

$projects = $database->query("SELECT * FROM projects", [
                             "current_user" => $currentUser])->fetchAll();

require "../views/projects.views.php";