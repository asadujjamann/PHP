<?php

/***************

include "BaseClass.php";

// PHP Fatal error:  Class ChildClass cannot extend final class BaseClass in...
class ChildClass extends BaseClass
{
    // Fatal error:  Cannot override final method BaseClass::displayMessage() in
    public function displayMessage()
    {
        echo "This is child class message";
    }
}

***************/