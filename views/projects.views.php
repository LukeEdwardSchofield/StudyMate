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

    <h1>Projects</h1>
    <div id="projects-main">

        <form action="/StudyMate/projects" method="POST">

            <input type="text" placeholder="Enter a project" name="project-input">

            <button type="submit">Submit</button>

        </form>


        <?php if(isset($errors["project"])) : ?>
            <p> <?=  $errors["project"] ?></p>
        <?php endif; ?>

            <div id="projects">

                <?php foreach($projects as $project) : ?>
                <li class="project">
                    <?= htmlspecialchars($project["project"])?>
                </li>
                <?php endforeach; ?>
            
            </div>
    </div>
    
    
</body>
</html>