<?php

include "Car.php";

class Garage 
{
    public function parkCar(Car $car) : void
    {
        echo "Parking car: {$car->getModel()} ";
    }
}

$myCar = new Car("Tesla500");
$garage = new Garage();
$garage->parkCar($myCar);