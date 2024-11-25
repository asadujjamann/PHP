<?php

/* Liskov Substitution Principle (LSP) */

/*
Objects of a superclass should be replaceable with objects of a subclass without altering the correctness of the program.
A subclass should only extend the behavior of a parent class and not break it.
*/




///// Example of Bad LSP
/*
class Rectangle 
{
    protected $width;
    protected $height;

    public function setWidth($width)
    {
        $this->width = $width;
    }
    public function setHeight($height)
    {
        $this->height = $height;
    }
    
    public function getArea()
    {
        return $this->width * $this->height;
    }
}

class Squre extends Rectangle
{
    public function setWidth($width)
    {
        $this->width = $width;
        $this->height = $width;
    }
    public function setHeight($height)
    {
        $this->width = $height;
        $this->height = $height;
    }
}
*/
/// Here, substituting Square for Rectangle breaks the logic because a square's width and height must always be equal.






///// Good example of LSP
interface Shapes 
{
    public function getArea();
}

class Rectangle implements Shapes
{
    

    public function __construct
    (
        protected $width,
        protected $height
    )
    { }
    public function getArea()
    {
        return $this->width * $this->height;
    }
}

class Square implements Shapes 
{
    protected $side;
    public function __construct($side)
    {
        $this->side = $side;
    }
    public function getArea()
    {
        return $this->side ** 2;
    }
}
/// Now, both Rectangle and Square adhere to the same interface and can be substituted interchangeably.