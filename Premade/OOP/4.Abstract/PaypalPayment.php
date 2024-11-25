<?php

include "Payment.php";

class PaypalPayment extends Payment
{
    public function process() // must be declare with body
    {
        echo "Processing Paypal payment.";
    }
}

$payment2 = new PaypalPayment();
$payment2->logTransaction(); // Transaction logged.
$payment2->process(); // Processing Paypal payment.