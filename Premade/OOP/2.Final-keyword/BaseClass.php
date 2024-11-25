<?php

/*
    class as final = Prevent Inheritance
    method as final = Prevent Method Overriding
*/


/***************  "final" keyword in class
final class BaseClass
{
    public function displayMessage()
    {
        echo "This is base class message";
    }
}
***************/


/*************** "final" keyword in method
class BaseClass
{
    final public function displayMessage()
    {
        echo "This is base class message";
    }
}
***************/


