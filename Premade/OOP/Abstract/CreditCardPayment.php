<?php

include "Payment.php";

class CreditCardPayment extends Payment
{
    public function process() // must be declare with body
    {
        echo "Processing Credit Card Payment.";
    }
    public function logTransaction() // Method overriding
    {
        echo "Credit Card Transaction logged. <br>";
    }
}

$payment1 = new CreditCardPayment();
$payment1->logTransaction(); // Credit Card Transaction logged.
$payment1->process(); // Processing Credit Card Payment.