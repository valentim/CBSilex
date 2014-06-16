<?php
namespace RestHandler\DataTransfer\Response\Booking;

use Clickbus\RestHandler\DataTransfer\Response\Booking\Booking;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Payment;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Item;

class BookingTest extends \PHPUnit_Framework_TestCase
{
    protected $booking;

    public function setUp()
    {
        $this->booking = new Booking();
    }

    public function testIntegrity()
    {
        $payment = new Payment();
        $item = new Item();

        $this->booking->setId(123);
        $this->booking->setStatus('pending');
        $this->booking->setLocalizer('ABDDDD999');
        $this->booking->setUuid('53347e09aee47');
        $this->booking->setPayment($payment);
        $this->booking->addItem($item);
        $this->booking->setCreatedAt('2010-10-30');

        $this->assertInternalType('int', $this->booking->id);
        $this->assertInternalType('string', $this->booking->status);
        $this->assertInternalType('string', $this->booking->localizer);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Booking\Payment', $this->booking->payment);
        $this->assertInternalType('array', $this->booking->items);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Booking\Item', $this->booking->items[0]);
        $this->assertInternalType('string', $this->booking->createdAt);
    }
}
