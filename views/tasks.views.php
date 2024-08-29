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

            <form action="/tasks" method="POST">
                <input type="hidden" name="task-id-edit" value="<?= $task["id"] ?>">
                <input type="text" id="task" name="task-edit-input" value="<?php echo htmlspecialchars($task["task"]); ?>">
                <button class="edit" type="submit">Edit</button>
                </input>
            </form>

            <form action="/tasks" method="POST">
                <input type="hidden" name="task-id-delete" value="<?= $task["id"] ?>">
                <button class="delete" type="submit">Delete</button>
            </form>

        <?php endforeach; ?>
    </div>
</body>
</html>