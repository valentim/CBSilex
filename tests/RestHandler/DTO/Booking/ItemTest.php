<?php
namespace RestHandler\DTO\Booking;

use Clickbus\RestHandler\DTO\Booking\Item;
use Clickbus\RestHandler\DTO\Booking\Departure;
use Clickbus\RestHandler\DTO\Booking\Arrival;
use Clickbus\RestHandler\DTO\Booking\Seat;
use Clickbus\RestHandler\DTO\Booking\Passenger;
use Clickbus\RestHandler\DTO\Booking\Product;

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
        $this->item->addProduct($product);
        $this->item->setSubtotal(1900);

        $this->assertInternalType('int', $this->item->trip_id);
        $this->assertInternalType('int', $this->item->order_item);
        $this->assertInstanceOf('Clickbus\RestHandler\DTO\Booking\Departure', $this->item->departure);
        $this->assertInstanceOf('Clickbus\RestHandler\DTO\Booking\Arrival', $this->item->arrival);
        $this->assertInstanceOf('Clickbus\RestHandler\DTO\Booking\Seat', $this->item->seat);
        $this->assertInstanceOf('Clickbus\RestHandler\DTO\Booking\Passenger', $this->item->passenger);
        $this->assertInternalType('array', $this->item->products);
        $this->assertInstanceOf('Clickbus\RestHandler\DTO\Booking\Product', $this->item->products[0]);
        $this->assertInternalType('int', $this->item->subtotal);
    }
}