<?php

include "EPaymentMethod.php";
include "EPaymentProcessor.php";

class CreditCardPayment implements EPaymentMethod 
{
    public function pay($amount)
    {
        echo "Paid {$amount}$ using Credit Card";
    }
}

$ePaymentProcessor->processPayment(new CreditCardPayment(), 2000);
