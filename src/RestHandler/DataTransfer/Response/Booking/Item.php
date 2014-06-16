<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Booking;

use Clickbus\RestHandler\DataTransfer\Response\Booking\Departure;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Arrival;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Seat;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Passenger;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Product;

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