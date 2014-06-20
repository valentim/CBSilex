<?php
namespace RestHandler\DataTransfer\Response\Booking;

use Clickbus\RestHandler\DataTransfer\Response\Booking\Refund;

class RefundTest extends \PHPUnit_Framework_TestCase
{
    protected $refund;

    public function setUp()
    {
        $this->refund = new Refund();
    }

    public function testIntegrity()
    {
        $this->refund->setType('partial');
        $this->refund->setTotal(2000);

        $this->assertInternalType('string', $this->refund->type);
        $this->assertInternalType('int', $this->refund->total);
    }
}