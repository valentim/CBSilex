<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Trip;

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Position extends AbstractTransferBehavior
{
    public $x;

    public $y;

    public $z;

    public function setX($x)
    {
        $this->x = $x;
    }

    public function setY($y)
    {
        $this->y = $y;
    }

    public function setZ($z)
    {
        $this->z = $z;
    }
}