<?php


/* Dependency Inversion Principle (DIP) */
/*
High-level modules should not depend on low-level modules. Both should depend on abstractions.
By using abstractions (like interfaces), we reduce the coupling between different parts of the system.
*/




///// Example of Bad DIP
/*
class MySQLDatabase 
{
    public function connect() 
    {
        // Connect to MySQL database
    }
}
class UserRepository
{
    private $database;
    public function __construct()
    {
        $this->database = new MySQLDatabase();
    }
}
*/
// Here, UserRepository is tightly coupled to MySQLDatabase.




///// Example of Good DIP
interface Database 
{
    public function connect();
}
class MySQLDatabase implements Database
{
    public function connect()
    {
        // Connect to MySQL Database
    }
}
class PostgreeSQLDatabase implements Database
{
    public function connect()
    {
        // Connect to PostgreeSQL Database
    }
}

class UserRepository 
{
    private $database;
    public function __construct(Database $database)
    {
        $this->database = $database;
    }
}
// Now, UserRepository depends on the Database abstraction, not on a specific database implementation.
