<?php

include "Bkash.php";

include "PaymentProcessor.php";

$bkash = new Bkash();
$bkashPayment = new PaymentProcessor($bkash);
$bkashPayment->PaymentProcess(1000.5);

