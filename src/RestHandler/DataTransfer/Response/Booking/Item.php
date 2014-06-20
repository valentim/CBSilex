<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Booking;

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Item extends AbstractTransferBehavior
{
    public $trip_id;

    public $order_item;

    public $departure;

    public $arrival;

    public $seat;

    public $passenger;

    public $products;

    public $subtotal;

    public function __construct()
    {
        $this->products = new \SplObjectStorage;
    }

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

    public function setProduct(Product $product)
    {
        $this->products->attach($product);
    }

    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;
    }
}