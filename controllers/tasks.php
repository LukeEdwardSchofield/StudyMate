<?php  
$config = require "../config.php";

require "../core/database.php";

$database = new Database($config["database"]);

$currentUserId = 1;
$errors = [];

 $tasks = $database->query("SELECT * FROM tasks WHERE user_id = :current_user_id",[
                           "current_user_id" => $currentUserId])->fetchAll();
                     
if($_SERVER['REQUEST_METHOD'] === "POST")
  {

    if(strlen($_POST["task-input"]) === 0)
    {
        $errors["task"] = "You must input a task";
    }

    if(strlen($_POST["task-input"]) > 50){
        $errors["task"] = "Your task input must not exceed 50 characters";
    }


    if(empty($errors))
    {
        $task = $database->query('INSERT INTO tasks(task, user_id) 
                                  VALUES(:task, :user_id)', 
       [
        "task" => $_POST["task-input"], 
        "user_id" => $currentUserId
       ])->fetchAll(); 
    }

    
                             
    
  }             
require "../views/tasks.views.php";