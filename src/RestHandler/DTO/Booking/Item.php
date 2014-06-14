<?php
namespace Clickbus\RestHandler\DTO\Booking;

use Clickbus\RestHandler\DTO\Booking\Departure;
use Clickbus\RestHandler\DTO\Booking\Arrival;
use Clickbus\RestHandler\DTO\Booking\Seat;
use Clickbus\RestHandler\DTO\Booking\Passenger;
use Clickbus\RestHandler\DTO\Booking\Product;

class Item
{
    public $trip_id;

    public $order_item;

    public $departure;

    public $arrival;

    public $seat;

    public $passenger;

    public $products = array();

    public $subtotal;

    public function setTripId($tripId)
    {
        $this->trip_id = $tripId;
    }

    public function setOrderItem($orderItem)
    {
        $this->order_item = $orderItem;
    }

    public function setDeparture(Departure $departure)
    {
        $this->departure = $departure;
    }

    public function setArrival(Arrival $arrival)
    {
        $this->arrival = $arrival;
    }

    public function setSeat(Seat $seat)
    {
        $this->seat = $seat;
    }

    public function setPassenger(Passenger $passenger)
    {
        $this->passenger = $passenger;
    }

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;
    }
}