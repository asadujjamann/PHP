<?php

/* Single Responsibility Principle (SRP) */

/*
A class should have only one responsibility.
This means a class should only have one reason to change. If a class has multiple responsibilities, changes in one responsibility might impact others, making the code harder to maintain.
*/


///// Example of Bad SRP
/*
class User 
{
    public function saveToDatabase($userData)
    {

    }
    public function sendWelcomeEmail($email)
    {

    }
}
*/



///// Example of Good SRP
class User
{
    public function saveToDatabase($userData)
    {

    }
}

class EmailService 
{
    public function sendWelcomeEmail($email) 
    {

    }
}