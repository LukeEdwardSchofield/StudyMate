<?php  
//Requiring the class, not the file
use Core\Database;
use Core\Validator;

$config = require "../config.php";
$database = new Database($config["database"]);

$currentUserId = 1;
$errors = [];

//Read
$projects = $database->query("SELECT * FROM projects WHERE user_id = :current_user_id", [
                             "current_user_id" => $currentUserId])->fetchAll();

//Checks if POST request is sent  
if($_SERVER['REQUEST_METHOD'] === "POST")
{
    //Checks if there exists a task-input in the POST array
    //task-input = contains the task created by the user
    if(isset($_POST["project-input"]))
    {
        if(!Validator::inputValid($_POST["project-input"]))
        {
            $errors["project"] = "A project containing no more than 50 characters is required";
        }

        if(empty($errors))
        {
         $database->query("INSERT INTO projects(project, user_id) 
                           VALUES(:projects, :current_user_id)",
                                [
                                 "projects" => $_POST["project-input"],
                                 "current_user_id" => $currentUserId
                                ])->fetchAll();

         header("Location: /projects");
         exit();   
        }
    }

    if(isset($_POST["project-id"]))
    {
        $database->query("DELETE FROM projects WHERE id = :id", 
                          ["id" => $_POST["project-id"]]);

        header("location: /projects");
        exit();
    }

        
    
    
}
require "../views/projects.views.php";