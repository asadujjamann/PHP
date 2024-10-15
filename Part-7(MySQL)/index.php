<?php 




/**********
//// (MySQLi Object-Oriented)
$server_name = "localhost";
$user_name = "root";
$password = "root";

// create connection
$connection = new mysqli($server_name, $user_name, $password);

// check connection
if($connection->connect_error){
    die("Connection failed: " . $connection->connect_error);
}else{
    echo "Connected Successfully";
}

$connection->close();
**********/




/**********
//// (MySQLi Procedural)
$server_name = "localhost";
$user_name = "root";
$password = "root";

// create connection
$connection = mysqli_connect($server_name, $user_name, $password);

// check connection
if(!$connection){
    die("Connection Failed: " . mysqli_connect_error());
}else{
    echo "Connected Successfully!";
}
mysqli_close($connection);
**********/




/**********
//// (PDO)
$server_name = "localhost";
$db_name = "hello_php";
$user_name = "root";
$password = "root";

try{
    $connection = new PDO("mysql:host=$server_name;dbname=$db_name", $user_name, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected Successfully";
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

$connection = null;
**********/




/**********
//// sql to create table
$server_name = "localhost";
$user_name = "root";
$password = "root";
$db_name = "hello_php";

// create connection
$connection = new mysqli($server_name, $user_name, $password, $db_name);

// check connection
if($connection->connect_error){
    die("Connection failed: " . $connection->connect_error);
}else{
    echo "Connected Successfully";
}

// sql to create table
$sql = "CREATE TABLE user (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if($connection->query($sql) === TRUE){
    echo "Table 'user' created successfully";
}else{
    echo "Error creating table: " . $connection->error;
}

$connection->close();
**********/




/**********
///// Insert Data

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

$sql = "INSERT INTO user (fullname, email, phone) VALUES ('Asad', 'typetoasad@gmail.com', '0123456789')";
if($connection->query($sql) === TRUE){
    echo "New record created successfully!";
}else{
    echo "Error: " . $sql . "<br>" . $connection->error;
}

$connection->close();
**********/




/**********
///// Read or Select Data
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

// Select data from "user" table and show in HTML table
$sql = "SELECT id, fullname, email, phone FROM user";
$result = $connection->query($sql);
if($result->num_rows > 0){
    echo "<table border='1' cellpadding='8' cellspacing='0'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        ";
    while($row = $result->fetch_assoc()){
        echo "<tr>
                <td> {$row['id']} </td>
                <td> {$row['fullname']} </td>
                <td> {$row['email']} </td>
                <td> {$row['phone']} </td>
             </tr>";
    }
    echo "</table>";
}else{
    echo "0 results";
}

$connection->close();
**********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/




// /**********

// **********/



