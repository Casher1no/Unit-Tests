<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Account;

class BankTest extends \PHPUnit\Framework\TestCase
{

    /** @test */
    public function depositTest(): void
    {
        $account = new Account();
        $account->deposit(500);
        $this->assertEquals(500, $account->getAmount());
    }
    /** @test */
    public function withdrawTest(): void
    {
        $account = new Account(500);
        $account->withdraw(100);
        $this->assertEquals(400, $account->getAmount());
    }
}
