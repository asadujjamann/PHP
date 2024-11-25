<?php

/* Interface Segregation Principle (ISP) */

/*
A class should not be forced to implement interfaces it doesn’t use.
Instead of creating one large interface, create smaller, more specific ones.
*/



///// Example of Bad ISP
/*
interface Worker 
{
    public function work();
    public function eat();
}

class Robot implements Worker 
{
    public function work()
    {
        // Robot works
    }
    public function eat()
    {
        // Robots don't eat
    }
}
*/




///// Example of Good ISP
interface Workable 
{
    public function work();
}
interface Eatable 
{
    public function eat();
}

class Robot implements Workable 
{
    public function work()
    {
        // Robot works
    }
}

class Human implements Workable, Eatable 
{
    public function work()
    {
        // Human works
    }
    public function eat()
    {
        // Human eats
    }
}

