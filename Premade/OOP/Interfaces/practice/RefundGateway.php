<?php

interface RefundGateway
{
    public function processOfRefund(float $amount) : bool;
}