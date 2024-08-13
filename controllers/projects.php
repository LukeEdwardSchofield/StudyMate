<?php 
use Core\database;
use Core\Validator;

require base_path("./core/validator.php");

$config = require base_path("config.php");

$db = new Database($config["database"]);
$errors = [];
$currentUserId = 1;

$projects = $db->query
        ("SELECT * FROM projects WHERE user_id = :user",
        ["user" => $currentUserId])->fetchAll();


if($_SERVER['REQUEST_METHOD'] === "POST")
{
    //if project does not exist
    //or if this condition returns true
    if(! Validator:: validateInput($_POST["project-input"], 1, 100)) {
        $errors["project"] = "A project of no more than 100 character is required";
    }

    if(empty($errors)){
        $project = $db->query("INSERT INTO projects(project, user_id)
                                VALUES(:project, :user_id)",
                                [
                                    "project" => $_POST["project-input"],
                                    "user_id" => $currentUserId
                                ]
                              );
    }

}

view("projects.views.php",[
     "projects" => $projects,
     "errors" => $errors
    ]);



