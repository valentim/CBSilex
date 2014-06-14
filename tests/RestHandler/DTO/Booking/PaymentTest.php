<?php
namespace RestHandler\DTO\Booking;

use Clickbus\RestHandler\DTO\Booking\Payment;
use Clickbus\RestHandler\DTO\Booking\Meta;

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
    }
}
