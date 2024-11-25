<?php

class UserRepository 
{
    private $database;
    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    public function getUsers()
    {
        $this->database->connect();
        echo "Fetching Users from Database...";
    }
}
