<?php

/* Open/Closed Principle (OCP) */

/*
Software entities should be open for extension but closed for modification.
You should be able to add new functionality without altering existing code, which reduces the risk of introducing bugs in existing functionality.
*/


///// Example of Bad OCP
class Payment 
{
    public function process($type)
    {
        if($type == "credit_card"){
            // Process Credit card Payment
        }elseif($type == "paypal"){
            // Process Paypal Payment
        }
    }
}







///// Example of Good OCP
interface PayemntMethod 
{
    public function process();
}

class CreditCardPayment implements PayemntMethod 
{
    public function process()
    {
        // Process credit card payment
    }
}

class PaypalPayment implements PayemntMethod 
{
    public function process()
    {
        // Process PayPal Payment
    }
}

class PaymentProcessor 
{
    public function process(PayemntMethod $payemntMethod)
    {
        $payemntMethod->process();
    }
}

/// You can now add new payment methods by creating new classes without modifying existing code.


