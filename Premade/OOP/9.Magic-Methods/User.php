<?php

class User
{
    private $username = "Asad";
    public function __get($name)
    {
        echo "$name is not defined. <br>";
    }
    public function __set($name, $value)
    {
        echo "You can not set the property $name and its value $value";
    }



    public function __call($name, $arguments)
    {
        if($name){
            echo "$name is not defined. <br>";
        }
        if($arguments){
            echo "And you are trying to call with argument - $arguments[0]<br>";
            echo "Arguments will be in Array: <br>";
            print_r($arguments);
        }
    }


    public function __toString()
    {
        return "You are trying to print this User object using \"echo\" which is not permitted. <br>";
    }


    public function __debugInfo()
    {
        echo "You are tyring to access the class using \" print_r() or var_dump()\" ";
    }

}

$user = new User();
$user->city; // city is not defined.
$user->age; // age is not defined.
$user->age = 50; // You can not set the property age and its value 50

echo "<br><br>";

$user->student("Asad");

echo "<br><br>";


echo $user; // You are trying to print this User object using "echo" which is not permitted.

// Normally, if anyone uses print_r() or var_dump()
// print_r($user); // User Object ( [username:User:private] => Asad )
// var_dump($user); // object(User)#1 (1) { ["username":"User":private]=> string(4) "Asad" }


// After set __debugInfo(), if anyone uses print_r() or var_dump()
print_r($user); // You are tyring to access the class using " print_r() or var_dump()" User Object ( )
var_dump($user); // You are tyring to access the class using " print_r() or var_dump()" object(User)#1 (0) { }



