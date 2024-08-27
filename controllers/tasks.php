<?php  
//Requiring the class, not the file
use Core\Database;

$config = require "../config.php";
$database = new Database($config["database"]);

$currentUserId = 1;
$errors = [];

//Read
 $tasks = $database->query("SELECT * FROM tasks WHERE user_id = :current_user_id",[
                           "current_user_id" => $currentUserId])->fetchAll();
                     
if($_SERVER['REQUEST_METHOD'] === "POST")
  {
    $validator = new Validator();

    if(!Validator::inputValid($_POST["task-input"]))
    {
      $errors["task"] = "A task containing no more than 50 characters is required";
    }


    if(empty($errors))
    {
      //Create
        $task = $database->query('INSERT INTO tasks(task, user_id) 
                                  VALUES(:task, :user_id)', 
       [
        "task" => $_POST["task-input"], 
        "user_id" => $currentUserId
       ])->fetchAll(); 

    

    }


    
                             
    
  }             
require "../views/tasks.views.php";