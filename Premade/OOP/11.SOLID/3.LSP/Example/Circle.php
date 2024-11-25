<?php

include "ShapeG.php";
include "ProcessShape.php";

class Circle implements ShapeG 
{
    public function __construct
    (
        protected $radius,
        public $shapeName = "Circle"
    )
    { }

    public function getArea()
    {
        return pi() * $this->radius ** 2;
    }
}

$processShape->printArea(new Circle(20));