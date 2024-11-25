<?php

include "EPaymentMethod.php";
include "EPaymentProcessor.php";

class PaypalPayment implements EPaymentMethod 
{
    public function pay($amount)
    {
        echo "Paid {$amount}$ using Paypal";
    }
}

$ePaymentProcessor->processPayment(new PaypalPayment(), 3000);