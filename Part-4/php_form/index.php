<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>


    <?php
        $nameErr = $emailErr = $genderErr = $urlErr = "";
        $name = $email = $url = $comment = $gender = "";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($_POST["name"])){
                $nameErr = "Required field";
            }else{
                $name = test_input($_POST["name"]);
                // check if name only contains letters and whitespace
                if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
                    $nameErr = "Only contains letters, dashes, apostrophes and whitespaces.";
                }
            }

            if(empty($_POST["email"])){
                $emailErr = "Required field";
            }else{
                $email = test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $emailErr = "Invalid email format";
                }
            }

            if(empty($_POST["url"])){
                $url = "";
            }else{
                $url = test_input($_POST["url"]);
                // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
                if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
                    $urlErr = "Invalid URL";
                }
            }

            if(empty($_POST["comment"])){
                $comment = "";
            }else{
                $comment = test_input($_POST["comment"]);
            }
            
            if(empty($_POST["gender"])){
                $genderErr = "Required field";
            }else{
                $gender = test_input($_POST["gender"]);
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
        <p>
            Name: <input type="text" name="name" value="<?= $name;?>">
            <span class="error"><?= $nameErr; ?></span>
        </p>
        <p>
            Email: <input type="email" name="email" value="<?= $email;?>">
            <span class="error"><?= $emailErr; ?></span>
        </p>
        <p>
            Website: <input type="url" name="url" value="<?= $url;?>">
            <span class="error"><?= $urlErr; ?></span>
        </p>
        <p>
            Comment: <textarea name="comment" cols="40" rows="5"><?= $comment;?></textarea>
        </p>
        <p>
            <input type="radio" name="gender" value="Male" 
                <?php if(isset($gender) && $gender == "Male") echo "checked" ?>
            > Male
            <input type="radio" name="gender" value="Female" 
                <?php if(isset($gender) && $gender == "Female") echo "checked "?>
            > Female
            <input type="radio" name="gender" value="Other"
                <?php if(isset($gender) && $gender == "Other") echo "checked" ?>
            > Other
            <span class="error"><?= $genderErr; ?></span>
        </p>
        <p>
            <input type="submit" name="submit" value="Submit">
        </p>
    </form>

    <?php 
        echo "<h2>Your input data: </h2>";
        echo "$name <br>";
        echo "$email <br>";
        echo "$url <br>";
        echo "$comment <br>";
        echo "$gender <br>";
    ?>


</body>
</html>