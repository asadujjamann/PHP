<?php

include "MotorCycle.php";

class Driver 
{
    public function startVehicle(Drivable $vehicle) : void
    {
        $vehicle->drive();
    }
}

$bike = new MotorCycle();
$driver = new Driver();
$driver->startVehicle($bike);

