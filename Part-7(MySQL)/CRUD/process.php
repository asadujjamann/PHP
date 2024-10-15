<?php 
include "db.php";

if(isset($_POST['save'])){
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if(!empty($fullname) && !empty($email) && !empty($phone)){
        if(empty($id)){
            $sql = "INSERT INTO user (fullname, email, phone) VALUES ('$fullname', '$email', '$phone')";
        }else{
            $sql = "UPDATE user SET fullname = '$fullname', email = '$email', phone = '$phone' WHERE id = $id";
        }
    
        if($connection->query($sql) === TRUE){
            header('Location: index.php');
        }else{
            echo "Error: " . $connection->error;
        }
    }else{
        header("Location: form.php");
        exit();
    }
}

$connection->close();