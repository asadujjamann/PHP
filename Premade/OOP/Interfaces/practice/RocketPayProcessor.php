<?php

include "Rocket.php";

include "PaymentProcessor.php";

$rocket = new Rocket();
$rocketPayment = new PaymentProcessor($rocket);
$rocketPayment->PaymentProcess(3000.5);

