<?php
namespace App;

class Account
{
    private int $amount;

    public function __construct($amount = 0)
    {
        $this->amount = $amount;
    }

    public function getAmount():int
    {
        return $this->amount;
    }

    public function deposit(int $amount):void
    {
        $this->amount += $amount;
    }
    public function withdraw(int $amount):void
    {
        $this->amount -= $amount;
    }
}
