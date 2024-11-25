<?php

include "PaymentGateway.php";
include "RefundGateway.php";


class Bkash implements PaymentGateway, RefundGateway
{
    public function processOfPayment(float $amount) : bool
    {
        echo "Processing of payment ৳" . $amount . " via Bkash";
        return true;
    }
    public function processOfRefund(float $amount) : bool{
        echo "Processing of payment ৳" . $amount . " via Bkash";
        return true;
    }
}

