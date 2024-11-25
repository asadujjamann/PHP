<?php

include "Database.php";
include "UserRepository.php";

class PostgreSQLDatabase implements Database
{
    public function connect()
    {
        echo "Connected to PostgreSQL Database. <br>";
    }
}

$userRepo = new UserRepository(new PostgreSQLDatabase());
$userRepo->getUsers();
