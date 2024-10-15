<?php 

include "db.php";

$fullname = $email = $phone = '';
$isEdit = false;

if(isset($_GET['id'])){
    $isEdit = true;
    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE id = $id";
    $result = $connection->query($sql);
    $user = $result->fetch_assoc();

    $fullname = $user['fullname'];
    $email = $user['email'];
    $phone = $user['phone'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $isEdit ? "Edit User" : "Add New User"; ?>
    </title>
    <style>
        .user-form-table,
        .user-form-table tr,
        .user-form-table td,
        .user-form-table th{
            padding: 5px 0;
        }
    </style>
</head>
<body>

    <h1>
        <?php echo $isEdit ? "Edit User" : "Add New User"; ?>
    </h1>

    <form action="./process.php" method="POST">
        <input type="hidden" name="id" value="<?= $isEdit ? $user['id']: '' ?>">
        <table class="user-form-table">
            <tr>
                <td><label for="name">Full Name: </label></td>
                <td><input id="name" type="text" name="fullname" value="<?= $fullname?>"></td>
            </tr>
            <tr>
                <td><label for="email">Email: </label></td>
                <td><input id="email" type="email" name="email" value="<?= $email?>"></td>
            </tr>
            <tr>
                <td><label for="mobile">Phone: </label></td>
                <td><input id="mobile" type="phone" name="phone" value="<?= $phone?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="save" value="<?= $isEdit ? "Update" : "Create" ?>">
                </td>
            </tr>
        </table>
    </form>

    <h3><a href="index.php"><< Back to List</a></h3>
</body>
</html>

<?php $connection->close() ?>
