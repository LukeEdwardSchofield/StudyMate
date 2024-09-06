<?php

use Core\Database;
use Core\Validator;


$email = $_POST["email"];
$password = $_POST["password"];

$errors = [];

//Verify email and password input

    //Verify email
    if(! Validator::emailValid($email))
    {
        $errors["email"] = "Invalid email";
    }
    //Verfiy password
    if(! Validator::inputValid($password, 5, 255))
    {
        $errors["password"] = "A password containing more than 5 characters is required";
    }

    //If any is not valid, redirect to signup/register
    if(! empty($errors))
    {

        require "./../views/registration/register.views.php";
    }


//If verified
$config = require "./../config.php";

$database = new Database($config["database"]);

    //Check if email already exists
    $user = $database->query("SELECT * FROM users WHERE email = :email",
    ["email" => $email])->fetchAll();

        //If it does exist, let user choose another email
        //If it does, redirect user to log in
       




