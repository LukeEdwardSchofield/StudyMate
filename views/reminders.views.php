<?php 
require "../public/style.css" 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>

<nav>
        <a href="/StudyMate/tasks">Tasks</a>
        <a href="/StudyMate/projects">Projects</a>
        <a href="/StudyMate/reminders">Reminders</a>
    </nav>

<h1>Reminders</h1>

    <form action="" method="POST">
        <input type="text" placeholder="Enter a reminder">
        <button type="submit">Submit</button>
    </form>
</body>
</html>