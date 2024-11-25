<?php

include "Workable.php";
include "Eatable.php";
include "ManageWork.php";

class Human implements Workable, Eatable 
{
    public function work()
    {
        echo "Human is Working. <br>";
    }
    public function eat()
    {
        echo "Human is Eating. <br>";
    }
}

$human = new Human();
$manageWork->manageWork($human); // Human is Working.
$human->eat(); // Human is Eating.

