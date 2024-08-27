<?php  
//Requiring the class, not the file
use Core\Database;

$config = require "../config.php";
$database = new Database($config["database"]);

$currentUserId = 1;
$errors = [];

$projects = $database->query("SELECT * FROM projects WHERE user_id = :current_user_id", [
                             "current_user_id" => $currentUserId])->fetchAll();

if($_SERVER['REQUEST_METHOD'] === "POST")
{
    if(strlen($_POST["project-input"]) === 0){
        $errors["project"] = "You must input a project";
    }

    if(strlen($_POST["project-input"]) > 50)
    {
        $errors["project"] = "Your project input must not exceed 50 characters";
    }

    if(empty($errors)){
        $project = $database->query("INSERT INTO projects(project, user_id) 
                                 VALUES(:projects, :current_user_id)",
                                 [
                                  "projects" => $_POST["project-input"],
                                  "current_user_id" => $currentUserId
                                  ])->fetchAll();
    }
    
}
require "../views/projects.views.php";