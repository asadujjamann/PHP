<?php

include "Animal.php";

class Cat extends Animal
{
    public function sound()
    {
        echo "Cat says Meow!!!";
    }
}

$cat = new Cat();
$cat->sound();
echo "<br>";
$cat->eat();