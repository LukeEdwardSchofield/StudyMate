<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    </head>
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

        <div class="sort" id="sort-reminder">
            <input type="text" placeholder="Search a Reminder">
            <button><i class="fas fa-search"></i></button>
        </div>

        <form action="/reminders" method="POST" class="form" id="reminder-form">
            <div class="input-container" id="reminder-input">
                <input type="text" class="input" name="reminder-input" placeholder="Input a reminder...">
                <input type="date" class="input-deadline" >
            </div>

            <div id="errors">
                <?php foreach($errors as $error) : ?>
                    <?php echo $error; ?>
                <?php endforeach; ?>
            </div>

            <button class="submit" type="submit">Add Reminder</button>
        </form>

       
        <div id="reminders">

            <?php foreach($reminders as $reminder) :?>
                <div class="container reminder">

                    <form action="/reminders" method="POST">
                        <input type="hidden" name="reminder-id-edit" value="<?= $reminder["id"]?>">
                        <input type="text" class="text" id="reminder-text" name="reminder-edit-input" value="<?= htmlspecialchars($reminder["reminder"]);?>"> </input>
                        <input type="date" class="deadline" id="reminder-deadline" value="">
                        <button type="submit" class="edit">Edit</button>
                    </form>

                    <form action="/reminders" method="POST" class="delete">
                        <input type="hidden" name="reminder-id-delete" value="<?= $reminder["id"]?>">
                        <button type="submit" class="delete">Delete</button>
                    </form>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
   
</div>

    



    
</body>
</html>