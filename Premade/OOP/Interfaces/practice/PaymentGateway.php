<?php

interface PaymentGateway
{
    public function processOfPayment(float $amount) : bool;
}
