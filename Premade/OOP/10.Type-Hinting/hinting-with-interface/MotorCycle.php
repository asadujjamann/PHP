<?php

include "Drivable.php";

class MotorCycle implements Drivable
{
    public function drive(): void
    {
        echo "Motorcycle is driving <br>";
    }
}

