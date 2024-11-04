<?php

include "PaymentGateway.php";
include "RefundGateway.php";


class Rocket implements PaymentGateway, RefundGateway
{
    public function processOfPayment(float $amount) : bool
    {
        echo "Processing of payment ৳" . $amount . " via Rocket";
        return true;
    }
    public function processOfRefund(float $amount) : bool{
        echo "Processing of payment ৳" . $amount . " via Rocket";
        return true;
    }
}