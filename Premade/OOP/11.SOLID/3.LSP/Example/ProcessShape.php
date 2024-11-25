<?php

class ProcessShape {
    public function printArea(ShapeG $shape)
    {
        echo "Area of {$shape->shapeName} is: " . $shape->getArea();
    }
}

$processShape = new ProcessShape();