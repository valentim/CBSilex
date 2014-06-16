<?php
namespace RestHandler\DataTransfer\Response\Booking;

use Clickbus\RestHandler\DataTransfer\Response\Booking\BookingDelete;
use Clickbus\RestHandler\DataTransfer\Response\Booking\PaymentDelete;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Meta;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Refund;
use Clickbus\RestHandler\DataTransfer\Response\Booking\DeleteItem;

class BookingDeleteTest extends \PHPUnit_Framework_TestCase
{
    protected $bookingDelete;

    public function setUp()
    {
        $this->bookingDelete = new BookingDelete();
    }

    public function testIntegrity()
    {
        $refund = new Refund();
        $meta = new Meta();
        $payment = new PaymentDelete();
        $item = new DeleteItem();

        $this->bookingDelete->setId('AAABC123-AAACCC-DDDFFF23323-DDDAAFFF');
        $this->bookingDelete->setStatus('canceled');
        $this->bookingDelete->setLocalizer('ABDDDD999');
        $this->bookingDelete->setPayment($payment);
        $this->bookingDelete->addItem($item);
    }
}