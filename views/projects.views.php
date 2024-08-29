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
    <h1>Projects</h1>

    <form action="/projects" method="POST">
        <input type="text" name="project-input" placeholder="Input a project...">
        <button type="submit">Submit</button>
    </form>

    <div id="errors">
        <?php foreach($errors as $error) : ?>
            <?php echo $error; ?>
        <?php endforeach; ?>
    </div>

    <div id="projects">
        <?php foreach($projects as $project) : ?>
            <li class="task">
                <?php echo htmlspecialchars($project["project"]); ?>

                <form action="/projects" method="POST">
                    <input type="hidden" name="project-id" value="<?= $project["id"]?>">   
                    <button class="delete" type="submit">Delete</button> 
                </form>
            </li>
        <?php endforeach; ?>
    </div>
</body>
</html>