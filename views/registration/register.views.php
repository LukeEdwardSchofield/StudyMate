<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Register here</h1>
    <form action="/register" method="POST">
        <input type="hidden" name="_method" value="POST">

        <div id="email">
            <input type="text" name="email" placeholder="email">
        </div>

        <?php if(isset($errors["email"])) :  ?>
            <p><?php echo $errors["email"] ?></p>
        <?php endif; ?>
        
        <div>
            <input type="text" name="password" placeholder="password">
        </div>

        <?php if(isset($errors["password"])) :  ?>
            <p><?php echo $errors["password"] ?></p>
        <?php endif; ?>

        <button type="submit">Sign Up</button>
        
    </form>

</body>
</html>