<?php  
//Requiring the class, not the file
use Core\Database;
use Core\Validator;

$config = require "../config.php";
$database = new Database($config["database"]);

$currentUserId = 1;
$errors = [];

//Read
$reminders = $database->query("SELECT * FROM reminders WHERE user_id = :current_user_id",
                             ["current_user_id" => $currentUserId])->fetchAll();

//Checks if POST request is sent
if($_SERVER['REQUEST_METHOD'] === "POST")
{
    //Create
    if(isset($_POST["reminder-input"]))
    {
        //If there is a POST array, check if the reminder-input is valid or contains no errors
      if(!Validator::inputValid($_POST["reminder-input"]))
        {
            $errors["reminder"] = "A reminder containing no more than 50 characters is required";
        }

        //If there are no errors, continue create
        if(empty($errors))
        {
            $database->query("INSERT INTO reminders(reminder, user_id) 
                                     VALUES(:reminder, :current_user_id)",
            [
                "reminder" => $_POST["reminder-input"],
                "current_user_id" => $currentUserId   
            ])->fetchAll();

            header("Location: /reminders");
            exit();
        }
    }

  //Edit
   if(isset($_POST["reminder-id-edit"]))
   {
        if(!Validator::inputValid($_POST["reminder-edit-input"]))
        {
            $errors["reminder"] = "A reminder containing no more than 50 characters is required";
        }

        if(empty($errors))
        {
           $database->query("UPDATE reminders SET reminder = :reminder WHERE id = :id",
        [
            "reminder" => $_POST["reminder-edit-input"],
            "id" => $_POST["reminder-id-edit"]
        ]);

        header("Location: /reminders");
        exit();  
        }
       
   }


   //Delete
   if(isset($_POST["reminder-id-delete"]))
   {
        $database->query("DELETE FROM reminders WHERE id = :id", 
                        ["id" => $_POST["reminder-id-delete"]]);;

        header("Location: /reminders");
        exit();
   }
}
    
require "../views/reminders.views.php";