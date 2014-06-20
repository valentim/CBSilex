<?php
namespace RestHandler\DataTransfer\Response\Booking;


use Clickbus\RestHandler\DataTransfer\Response\Booking\Booking;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Item;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Payment;

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
        $this->booking->setItem($item);
        $this->booking->setCreatedAt('2010-10-30');

        $this->booking->items->rewind();

        $this->assertInternalType('int', $this->booking->id);
        $this->assertInternalType('string', $this->booking->status);
        $this->assertInternalType('string', $this->booking->localizer);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Booking\Payment', $this->booking->payment);
        $this->assertInstanceOf('SplObjectStorage', $this->booking->items);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Booking\Item', $this->booking->items->current());
        $this->assertInternalType('string', $this->booking->createdAt);
    }
}
