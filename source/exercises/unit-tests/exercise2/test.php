<?php

use PHPUnit\Framework\TestCase;


final class CalculatorTest extends TestCase
{
    // An email should have an @ sign in it
    public function testNoAtSign(){
        $e = new Email('infoexample.com');
        $this->assertFalse($e->isValid(), 'Email should contain @');    
    }

    // An email should not have any uppercase letter
    // this is for test purposes only!
    public function testUppercase()
    {
        $e = new Email('INFO@example.com');
        $this->assertFalse($e->isValid(), 'Email should only be lower case!');
    }

    // public function testDomainExtension()
    // {
    //     $e = new Email('info@example.technology');
    //     $this->assertFalse($e->isValid(), 'Domain extensions should be two or three letters.');
    // }

    public function testMagicToString()
    {
        $e = new Email('info@example.com');
        $this->assertEquals('info@example.com', $e);
    }

}