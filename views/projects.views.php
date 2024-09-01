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
            <div class="sort" id="sort-project">
                <input type="text" placeholder="Search Project" />
                <button><i class="fas fa-search"></i></button>
            </div>

        <form action="/projects" method="POST" class="form" id="project-form">
            <div class="input-container" id="project-input">
                <input type="text" class="input" id="project-input" name="project-input" placeholder="Input a project...">
                <input type="date" class="input-deadline" name="project-deadline">
            </div>

            <div id="errors">
                <?php foreach($errors as $error) : ?>
                    <?php echo "<p>" . $error . "</p>";; ?>
                <?php endforeach; ?>
            </div>
            
            <button class="submit" type="submit">Add Project</button>
        </form>

       

        <div id="projects">
            <?php foreach($projects as $project) : ?>
                <div class="container project">

                    <form action="/projects" method="POST">
                        <input type="hidden" name="project-id-edit" value="<?= $project["id"]?>">
                        <input type="text" class="text" id="project-text"  name="project-edit-input" value="<?= htmlspecialchars($project["project"]); ?>"></input> 
                        <input type="date" class="deadline" id="project-deadline" value="">
                        <button class="edit" type="submit">Edit</button>  
                    </form>

                    <form action="/projects" method="POST" class="delete">
                        <input type="hidden" name="project-id-delete" value="<?= $project["id"]?>">   
                        <button class="delete" type="submit">Delete</button> 
                    </form>
                </div>

            <?php endforeach; ?>

        </div>

    </div>
    
</div>
    
</body>
</html>