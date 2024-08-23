<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
 
    <nav>
    <a href="/tasks">Tasks</a>
    <a href="/projects">Projects</a>
    <a href="/reminders">Reminders</a>
    </nav>
    
<h1>Projects</h1>

<form action="../controllers/projects.php" method="POST">
    <input type="text" name="project-input">
    <button type="submit">Submit</button>
</form>

</body>
</html>