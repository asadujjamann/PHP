<?php

class PaymentProcessor
{
    private PaymentGateway $gateway;
    public function __construct(PaymentGateway $gateway)
    {
        $this->gateway = $gateway;
    }
    public function PaymentProcess($amount)
    {
        $this->gateway->processOfPayment($amount);
    }
}