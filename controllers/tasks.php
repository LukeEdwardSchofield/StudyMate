<?php 
use Core\database;
use Core\Validator;


require base_path("./core/validator.php");

$config = require base_path("config.php");

$db = new Database($config["database"]);
$errors = [];
$currentUserId = 1;

$tasks = $db->query
            ('SELECT * FROM tasks WHERE user_id = :user',
            ['user' => $currentUserId])->fetchAll();


if($_SERVER['REQUEST_METHOD'] === "POST")
{
    //if task does not exist
    //or if this condition returns true
    if(! Validator:: validateInput($_POST["task-input"], 1, 100)) {
        $errors["task"] = "A task of no more than 100 characters is required";
    }

    
    //if there's not a single error in the errors array, we continue the query
    if(empty($errors)){
         $task = $db->query('INSERT INTO tasks(task, user_id) 
                        VALUES(:task, :user_id)', 
                        [
                            "task" => $_POST["task-input"], 
                            "user_id" => $currentUserId
                        ]
                      );
    }
   
}
view("tasks.views.php", [
     "tasks" => $tasks,
     "errors" => $errors
]);





