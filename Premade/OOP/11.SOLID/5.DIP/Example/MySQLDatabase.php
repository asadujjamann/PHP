<?php

include "Database.php";
include "UserRepository.php";

class MySQLDatabase implements Database
{
    public function connect()
    {
        echo "Connected to MySQL Database. <br>";
    }
}

$userRepo = new UserRepository(new MySQLDatabase());
$userRepo->getUsers();