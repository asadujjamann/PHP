<?php

class BankAccount
{
    private $balance;
    public function __construct($initialBalance)
    {
        $this->balance = $initialBalance;
    }
    public function getBalance()
    {
        return $this->balance;
    }
    public function depositAmount($amount)
    {
        if($amount > 0){
            $this->balance += $amount;
        }else{
            echo "Invalid Balance Amount!";
        }
    }
    public function withdraw($amount)
    {
        if($amount > 0 && $amount >= $this->balance){
            $this->balance -= $amount;
        }else{
            echo "Insufficient funds or invalid amount.";
        }
    }
}

$balance = new BankAccount(1000);
echo "Initial Balance: " . $balance->getBalance() . "<br>"; // Initial Balance: 1000

$balance->depositAmount(5000);
echo "After Deposit total Balance: " . $balance->getBalance() . "<br>"; // After Deposit total Balance: 6000

$balance->withdraw(6000);
echo "After Withdraw total Balance: " . $balance->getBalance() . "<br>"; // After Withdraw total Balance: 0
