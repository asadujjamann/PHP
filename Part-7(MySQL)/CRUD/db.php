<?php 

$server_name = "localhost";
$user_name = "root";
$password = "root";
$db_name = "hello_php";

// create connection
$connection = new mysqli($server_name, $user_name, $password, $db_name);

// check connection
if($connection->connect_error){
    die("Connection failed: " . $connection->connect_error);
}