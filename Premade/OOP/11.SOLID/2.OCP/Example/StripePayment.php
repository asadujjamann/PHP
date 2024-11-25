<?php

include "EPaymentMethod.php";
include "EPaymentProcessor.php";

class StripePayment implements EPaymentMethod 
{
    public function pay($amount)
    {
        echo "Paid {$amount}$ using Stripe";
    }
}

$ePaymentProcessor->processPayment(new StripePayment(), 2500);