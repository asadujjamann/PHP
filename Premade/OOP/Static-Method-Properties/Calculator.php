<?php

class Calculator
{
    public static $pi = 3.1416;
    public static function add($a, $b)
    {
        return $a + $b . "<br>";
    }
    public static function multiply($a, $b)
    {
        return $a * $b . "<br>";
    }
    public static function areaOfCircle($radius)
    {
        return self::$pi * $radius ** 2 . "<br>";
    }
    public static function describeCircle($radius)
    {
        $area = self::areaOfCircle($radius);
        return "A circle with radius $radius has an area of $area <br>";
    }
}

echo Calculator::$pi; // 3.1416
echo Calculator::add(5, 10); // 15
echo Calculator::multiply(5, 10); // 50

echo Calculator::areaOfCircle(5); // 78.54

echo Calculator::describeCircle(5); // A circle with radius 5 has an area of 78.54

// $calculator = new Calculator();
// echo $calculator->areaOfCircle(20);

