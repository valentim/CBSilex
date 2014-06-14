<?php
namespace Clickbus\RestHandler\DTO\Booking;

use Clickbus\RestHandler\DTO\Booking\Type;

class Seat
{
    public $id;

    public $name;

    public $price;

    public $status;

    public $currency;

    public $type;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function setType(Type $type)
    {
        $this->type = $type;
    }
}