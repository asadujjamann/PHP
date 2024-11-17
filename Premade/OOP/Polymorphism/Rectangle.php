<?php

include "Shape.php";

class Rectangle implements Shape
{
    public $name = "Rectangle";
    private $width;
    private $height;
    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }
    public function area()
    {
        return $this->width * $this->height;
    }
}

include "printArea.php";

printArea(new Rectangle(5, 10));  // Area of Rectangle: 50