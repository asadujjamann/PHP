<?php

include "Workable.php";
include "ManageWork.php";

class Robot implements Workable 
{
    public function work()
    {
        echo "Robot is Working. <br>";
    }
}

$robot = new Robot();
$manageWork->manageWork($robot); // Robot is Working.

