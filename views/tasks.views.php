<?php echo '<link rel="stylesheet" href=../public/style.css>';?>

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

    <h1>Tasks</h1>
    <div id="task-main">

            <form action="/StudyMate/tasks" method="POST">          
                                                                          <!--To make the text within the input persist-->                    
                <input type="text" placeholder="Enter a task" name="task-input" value="<?= isset($_POST["task"]) ? $_POST["task"] : ""?>">
                    
                <button type="submit">Submit</button>

            </form>


            <?php if(isset($errors["task"])) : ?>
                <p> <?= $errors["task"] ?> </p>  
            <?php endif; ?>

            <div id="tasks">

                <?php foreach($tasks as $task) : ?>
                <li class="task">
                    <?= htmlspecialchars($task["task"]) ?>
                </li>
                <?php endforeach; ?>

            </div>  
    </div>

</body>
</html>