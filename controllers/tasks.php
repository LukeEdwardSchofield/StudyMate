<?php  
//Requiring the class, not the file
use Core\Database;
use Core\Validator;

$config = require "../config.php";
$database = new Database($config["database"]);

$currentUserId = 1;
$errors = [];

//Read
 $tasks = $database->query("SELECT * FROM tasks WHERE user_id = :current_user_id",[
                           "current_user_id" => $currentUserId])->fetchAll();


//Checks if POST request is sent                     
if($_SERVER['REQUEST_METHOD'] === "POST")
{
    //Create
    //Checks if there exists a task-input in the POST array
    //task-input = contains the task created by the user
    if(isset($_POST["task-input"]))
    {
      //If there is a POST array, check if the task-input is valid or contains no errors
      $validator = new Validator();

      if(!Validator::inputValid($_POST["task-input"]))
        {
            $errors["task"] = "A task containing no more than 50 characters is required";
        }

      //If there is no errors, continue create
      if(empty($errors))
        {
       
          $database->query('INSERT INTO tasks(task, user_id) 
                                    VALUES(:task, :user_id)', 
          [
            "task" => $_POST["task-input"], 
            "user_id" => $currentUserId
          ])->fetchAll(); 

        header("Location: /tasks");
        exit();
        }
    }  

    //Delete
    //Checks if there exists a task-id in the POST array
    //task-id = pertains to the id that a specific task have
    if(isset($_POST["task-id-delete"]))
    {
      $database->query("DELETE FROM tasks WHERE id = :id", 
      [ 
        "id" => $_POST["task-id-delete"]
      ]);

      header("Location: /tasks");
      exit();
    }

    //Edit 
    if(isset($_POST["task-id-edit"]))
    {
      $database->query("UPDATE tasks SET task = :task WHERE id = :id",
      [
       "task" => $_POST["task-edit-input"],
       "id" => $_POST["task-id-edit"]
      ]);

      header("Location: /tasks");
      exit();
    }


    
  }    
  
  require "../views/tasks.views.php";
