<?php

function printArea(Shape $shape)
{
    echo "Area of " . $shape->name . ": " . $shape->area() . "<br>";
}
