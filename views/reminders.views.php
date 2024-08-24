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
    <h1>Reminders</h1>

    <form action="/reminders" method="POST">
        <input type="text" name="reminder-input" placeholder="Input a reminder...">
        <button type="submit">Submit</button>
    </form>

    <div id="errors">
        <?php foreach($errors as $error) : ?>
            <?php echo $error; ?>
        <?php endforeach; ?>
    </div>

    <div id="reminders">
        <?php foreach($reminders as $reminder) :?>
            <li class="reminder">
                <?php echo htmlspecialchars($reminder["reminder"]); ?>
            </li>
        <?php endforeach; ?>
    </div>
</body>
</html>