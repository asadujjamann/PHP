<?php

include "ShapeG.php";
include "ProcessShape.php";

class Rectangle implements ShapeG 
{
    protected $width;
    protected $height;
    public $shapeName;

    public function __construct($width, $height, $shapeName = "Rectangle")
    {
        $this->width = $width;
        $this->height = $height;
        $this->shapeName = $shapeName;
    }

    public function getArea()
    {
        return $this->width * $this->height;
    }
}

$processShape->printArea(new Rectangle(20, 40));