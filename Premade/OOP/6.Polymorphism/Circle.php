<?php

include "Shape.php";

class Circle implements Shape
{
    public $name = "Circle";
    private $radius;
    public function __construct($radius)
    {
        $this->radius = $radius;
    }
    public function area()
    {
        return pi() * $this->radius ** 2;
    }
}

include "printArea.php";

printArea(new Circle(6));  // Area of Circle: 113.09733552923