<?php
namespace Clickbus\RestHandler\DTO\Trip;

use Clickbus\RestHandler\DTO\Trip\Position;
use Clickbus\RestHandler\DTO\Trip\Details;

class Seat
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