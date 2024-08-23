<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav> 
        <a href="/tasks">Tasks</a>
        <a href="/projects">Projects</a>
        <a href="/reminders">Reminders</a>
    </nav>
    <h1>Tasks</h1>

    <form action="../controllers/tasks.php">
        <input type="text" name="task-input" placeholder="Input a task...">
        <button type="submit">Submit</button>
    </form>
</body>
</html>