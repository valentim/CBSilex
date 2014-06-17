<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Trip;

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class SeatType extends AbstractTransferBehavior
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