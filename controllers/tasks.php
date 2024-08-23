<?php


require "../core/database.php";

$config = require("../config.php");

$db = new Database($config["database"]);

$userId = 2;

$tasks = $db->query("SELECT * FROM tasks where user_id = :user_id",
                    ["user_id" => $userId])->fetchAll();

require "../views/tasks.views.php";








