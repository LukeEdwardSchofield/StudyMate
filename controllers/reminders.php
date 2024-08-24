<?php  
$config = require "../config.php";

require "../core/database.php";

$database = new Database($config["database"]);

$reminders = $database->query("SELECT * FROM reminders")->fetchAll();


require "../views/reminders.views.php";