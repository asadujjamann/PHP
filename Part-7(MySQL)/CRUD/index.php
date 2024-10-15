<?php
    include "db.php";

    // Select data from "user" table and show in HTML table
    $sql_select = "SELECT id, fullname, email, phone FROM user";
    $result_of_select = $connection->query($sql_select);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operation</title>
    <style>
        .user-table,
        .user-table tr,
        .user-table th,
        .user-table td{
            border: 2px solid green;
            border-collapse: collapse;
            padding: 8px;
        }
        .btn-green,
        .btn-red{
            display: inline-block;
            padding: 5px;
            text-decoration: none;
            color: #fff;
        }
        .btn-red{
            background-color: red;
        }
        .btn-green{
            background-color: green;
        }
    </style>
</head>
<body>

<h1>User Management</h1>
<h3><a href="form.php">Add New User</a></h3>

<?php if($result_of_select->num_rows > 0){ ?>

<table class="user-table">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>
    <?php
        $serial_no = 1;
        while($row = $result_of_select->fetch_assoc()): ?>
        <tr>
            <td> <?= $serial_no++ ?> </td>
            <td> <?= $row['fullname'] ?> </td>
            <td> <?= $row['email'] ?> </td>
            <td> <?= $row['phone'] ?> </td>
            <td>
                <a class="btn-green" href="form.php?id=<?= $row['id']?>">Edit</a>
                <a class="btn-red" href="delete.php?id=<?= $row['id']?>" onclick="return confirm('Are you Sure to Delete this?')">Delete</a>
            </td>
        </tr>
    <?php endwhile?>
</table>

<?php
    }else{
        echo "<h2>0 results</h2>";
    }
?>

</body>
</html>


<?php $connection->close(); ?>