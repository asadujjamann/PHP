<?php 

if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(!empty($username) && !empty($password)){
        echo "<h2>Registration Successful</h2>";
        echo "Username: {$username} <br>";
        echo "Username: {$password} <br>";
    }else{
        header('Location: index.php');
        exit;
    }
}