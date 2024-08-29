<?php  
//Requiring the class, not the file
use Core\Database;
use Core\Validator;

$config = require "../config.php";
$database = new Database($config["database"]);

$currentUserId = 1;
$errors = [];

$reminders = $database->query("SELECT * FROM reminders WHERE user_id = :current_user_id",
                             ["current_user_id" => $currentUserId])->fetchAll();

if($_SERVER['REQUEST_METHOD'] === "POST")
{
    if(isset($_POST["reminder-input"]))
    {
        if(!Validator::inputValid($_POST["reminder-input"]))
        {
            $errors["reminder"] = "A reminder containing no more than 50 characters is required";
        }

        if(empty($errors))
        {
            $reminder = $database->query("INSERT INTO reminders(reminder, user_id) 
                                  VALUES(:reminder, :current_user_id)",
                                 [
                                  "reminder" => $_POST["reminder-input"],
                                  "current_user_id" => $currentUserId   
                                 ])->fetchAll();

            header("Location: /reminders");
            exit();
        }
    }

   if(isset($_POST["reminder-id"]))
   {
    $database->query("DELETE FROM reminders WHERE id = :id", 
                    ["id" => $_POST["reminder-id"]]);;

    header("Location: /reminders");
    exit();
   }
        
}
    

require "../views/reminders.views.php";