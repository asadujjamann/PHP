<?php

include "Nagad.php";

include "PaymentProcessor.php";

$nagad = new Nagad();
$nagadPayment = new PaymentProcessor($nagad);
$nagadPayment->PaymentProcess(2000.5);

