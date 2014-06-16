<?php
namespace RestHandler\DataTransfer\Response\Booking;

use Clickbus\RestHandler\DataTransfer\Response\Booking\Payment;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Meta;

class PaymentTest extends \PHPUnit_Framework_TestCase
{
    protected $payment;

    public function setUp()
    {
        $this->payment = new Payment();
    }

    public function testIntegrity()
    {
        $meta = new Meta();

        $this->payment->setMethod('Credit Card');
        $this->payment->setTotal(3900);
        $this->payment->setCurrency('BRL');
        $this->payment->setStatus('pending');
        $this->payment->setMeta($meta);

        $this->assertInternalType('string', $this->payment->method);
        $this->assertInternalType('int', $this->payment->total);
        $this->assertInternalType('string', $this->payment->currency);
        $this->assertInternalType('string', $this->payment->status);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Booking\Meta', $this->payment->meta);
    }
}
