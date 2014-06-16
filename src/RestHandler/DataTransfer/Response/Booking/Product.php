<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Booking;

class Product
{
    public $uuid;

    public $name;

    public $quantity;

    public $price;

    public $currency;

    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }
}