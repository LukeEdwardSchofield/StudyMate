<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>

    <header>
        <img src="/img/studyMate-logo.png" alt="StudyMate">
    </header>

    <div class="body">
        <nav> 
            <a href="/tasks">Tasks</a>
            <a href="/projects">Projects</a>
            <a href="/reminders">Reminders</a>
        </nav>

        <div class="main">

            <div class="sort" id="sort-task">
                <input type="text" placeholder="Search a Task"/>
                <button><i class="fas fa-search"></i></button>
            </div>

            <form action="/tasks" method="POST" class="form" id="task-form">
                <div class="input-container" id="task-input">
                    <input type="text" class="input" id="task-input"  name="task-input" placeholder="Input a task..." >
                    <input type="date" class="input-deadline" id name="task-deadline">
                </div>

                <div id="errors">
                    <?php foreach($errors as $error) : ?>
                        <?php echo "<p>" . $error . "</p>"; ?>
                    <?php endforeach; ?>
                </div>
            
                <button class="submit" type="submit">Add Task</button>
            </form>

            
            <div id="tasks">
                <?php foreach($tasks as $task) : ?>
                    <div  class="container task">

                        <form action="/tasks" method="POST">
                            <input type="hidden" name="task-id-edit" value="<?= $task["id"] ?>">
                            <input type="text" class="text" id="task-text" name="task-edit-input" value="<?php echo htmlspecialchars($task["task"]); ?>">
                            <input type="date" class="deadline" id="task-deadline" value="">
                            <button class="edit" type="submit">Edit</button>
                        </form>


                        <form action="/tasks" method="POST" class="delete">
                            <input type="hidden" name="task-id-delete" value="<?= $task["id"] ?>">
                            <button type="submit" class="delete" >Delete</button>
                        </form>

                    </div>
                <?php endforeach; ?>
            </div>
        
    </div>
    
</body>
</html>