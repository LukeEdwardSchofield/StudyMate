<?php  
//Requiring the class, not the file
use Core\Database;

$config = require "../config.php";
$database = new Database($config["database"]);

$currentUserId = 1;
$errors = [];

$reminders = $database->query("SELECT * FROM reminders WHERE user_id = :current_user_id",
                             ["current_user_id" => $currentUserId])->fetchAll();

if($_SERVER['REQUEST_METHOD'] === "POST")
{
    if(strlen($_POST["reminder-input"]) === 0)
    {
        $errors["reminder"] = "You must input a reminder"; 
    }

    if(strlen($_POST["reminder-input"]) > 50)
    {
       $errors["reminder"] = "Your reminder input must not exceed 50 characters";  
    }

    if(empty($errors)){
        $reminder = $database->query("INSERT INTO reminders(reminder, user_id) 
                                  VALUES(:reminder, :current_user_id)",
                                 [
                                  "reminder" => $_POST["reminder-input"],
                                  "current_user_id" => $currentUserId   
                                 ])->fetchAll();
    }
    
}
require "../views/reminders.views.php";