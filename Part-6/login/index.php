<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
</head>
<body>
    <h2>Login as User</h2>
    <form action="submit.php" method="post">
        <p>
            <label for="username">Username: </label>
            <input id="username" type="text" name="username">
        </p>
        <p>
            <label for="password">Password: </label>
            <input id="password" type="password" name="password">
        </p>
        <p>
            <?php
                if(empty($_POST['username']) && empty($_POST['password'])){
                    echo "Both fields are required!";
                }
            ?>
        </p>
        <p>
            <input type="submit" value="Login">
        </p>
    </form>
</body>
</html>