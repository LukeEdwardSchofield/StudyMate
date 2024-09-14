<?php  

// return $routes = [
//     "/register" => "../controllers/registration/register.php",
//     "/registered" => "../controllers/registration/registered.php",
//     "/" => "../controllers/home.php",
//     "/tasks" => "../controllers/tasks.php",
//     "/projects" => "../controllers/projects.php",
//     "/reminders" => "../controllers/reminders.php"
// ];
$router->get("/", "../controllers/home.php");

$router->get("/tasks", "../controllers/tasks.php");
$router->post("/tasks", "../controllers/tasks.php");

$router->get("/projects", "../controllers/projects.php");
$router->post("/projects", "../controllers/projects.php");

$router->get("/reminders", "../controllers/reminders.php");
$router->post("/reminders", "../controllers/reminders.php");