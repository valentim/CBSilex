<?php
namespace Clickbus\RestHandler\DTO\Trip;

class SeatType
{
    public $name;

    public $discount;

    public $id;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}