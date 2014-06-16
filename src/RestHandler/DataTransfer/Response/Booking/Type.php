<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Booking;

class Type
{
    public $name;

    public $discount;

    public $id;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDicount($discount)
    {
        $this->discount = $discount;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}