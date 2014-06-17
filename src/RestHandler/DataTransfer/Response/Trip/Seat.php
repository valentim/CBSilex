<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Trip;

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Seat extends AbstractTransferBehavior
{
    public $id;

    public $name;

    public $available;

    public $position;

    public $details;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAvailable($available)
    {
        $this->available = $available;
    }

    public function setPosition(Position $position)
    {
        $this->position = $position;
    }

    public function setDetails(Details $details)
    {
        $this->details = $details;
    }
}