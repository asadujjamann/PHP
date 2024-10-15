<?php 
include "db.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM user WHERE id = $id";
    $result = $connection->query($sql);
    if($result === TRUE){
        header('Location: index.php');
        // header("refresh:3;url=index.php");
    }else{
        echo "Delete failed" . $connection->error;
    }
}

$connection->close();