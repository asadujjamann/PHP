<?php


abstract class Animal
{
    abstract public function sound();
    public function eat()
    {
        echo "Animal is eating.";
    }
}

// $animal = new Animal(); // Fatal error: Uncaught Error: Cannot instantiate abstract class Animal in ...

