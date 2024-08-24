<?php  
$config = require "../config.php";

require "../core/database.php";

$database = new Database($config["database"]);

$currentUser = 1;

 $tasks = $database->query("SELECT * FROM tasks",[
                           "current_user" => $currentUser])->fetchAll();

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $database->query("INSERT INTO tasks(task, user_id) VALUES(:task, :user_id)",[
                     ":task" => $_POST["task-input"],
                     ":user_id" => $currentUser
    ]);
                   

    
}

require "../views/tasks.views.php";