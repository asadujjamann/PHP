<?php

include "ShapeG.php";
include "ProcessShape.php";

class Square implements ShapeG
{
    public function __construct
    (
        protected $side,
        public $shapeName = "Square"
    )
    { }

    public function getArea()
    {
        return $this->side ** 2;
    }
}

$processShape->printArea(new Square(5));