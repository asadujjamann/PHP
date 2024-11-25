<?php

include "PaymentGateway.php";
include "RefundGateway.php";


class Nagad implements PaymentGateway, RefundGateway
{
    public function processOfPayment(float $amount) : bool
    {
        echo "Processing of payment ৳" . $amount . " via Nagad";
        return true;
    }
    public function processOfRefund(float $amount) : bool{
        echo "Processing of payment ৳" . $amount . " via Nagad";
        return true;
    }
}