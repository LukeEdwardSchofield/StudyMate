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

    <form action="/tasks" method="POST">
        <input type="text" name="task-input" placeholder="Input a task...">
        <button type="submit">Submit</button>
    </form>

    <div id="errors">
        <?php foreach($errors as $error) : ?>
            <?php echo $error; ?>
        <?php endforeach; ?>
    </div>

    <div id="tasks">
        <?php foreach($tasks as $task) : ?>
            <li id="task">
                <?php echo htmlspecialchars($task["task"]); ?>
                <form method="/tasks" action="POST">
                    <button class="delete">Delete</button>
                </form>
            </li>
            
        <?php endforeach; ?>
    </div>
</body>
</html>