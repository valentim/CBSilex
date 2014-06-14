<?php
namespace RestHandler\DTO\Booking;

use Clickbus\RestHandler\DTO\Booking\BookingDelete;
use Clickbus\RestHandler\DTO\Booking\PaymentDelete;
use Clickbus\RestHandler\DTO\Booking\Meta;
use Clickbus\RestHandler\DTO\Booking\Refund;
use Clickbus\RestHandler\DTO\Booking\DeleteItem;

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