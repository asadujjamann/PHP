<?php

class EPaymentProcessor 
{
    public function processPayment(EPaymentMethod $ePaymentMethod, $amount)
    {
        $ePaymentMethod->pay($amount);
    }
}
$ePaymentProcessor = new EPaymentProcessor();