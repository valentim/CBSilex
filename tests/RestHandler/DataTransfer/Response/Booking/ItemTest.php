<?php
namespace RestHandler\DataTransfer\Response\Booking;

use Clickbus\RestHandler\DataTransfer\Response\Booking\Arrival;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Departure;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Item;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Passenger;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Product;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Seat;

class ItemTest extends \PHPUnit_Framework_TestCase
{
    protected $item;

    public function setUp()
    {
        $this->item = new Item();
    }

    public function testIntegrity()
    {
        $departure = new Departure();
        $arrival = new Arrival();
        $seat = new Seat();
        $passenger = new Passenger();
        $product = new Product();

        $this->item->setTripId(123123123);
        $this->item->setOrderItem(1234);
        $this->item->setDeparture($departure);
        $this->item->setArrival($arrival);
        $this->item->setSeat($seat);
        $this->item->setPassenger($passenger);
        $this->item->setProduct($product);
        $this->item->setSubtotal(1900);

        $this->item->products->rewind();

        $this->assertInternalType('int', $this->item->trip_id);
        $this->assertInternalType('int', $this->item->order_item);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Booking\Departure', $this->item->departure);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Booking\Arrival', $this->item->arrival);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Booking\Seat', $this->item->seat);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Booking\Passenger', $this->item->passenger);
        $this->assertInstanceOf('SplObjectStorage', $this->item->products);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Booking\Product', $this->item->products->current());
        $this->assertInternalType('int', $this->item->subtotal);
    }
}