<?php

class ExampleTest extends \PHPUnit\Framework\TestCase
{
    public function testThatsStringsMatch()
    {
        $string1 = "testing";
        $string2 = 'testing';

        $this->assertSame($string1, $string2);
    }
}
