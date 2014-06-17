<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Trip;

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class BusCompany extends AbstractTransferBehavior
{
    public $name;

    public function setName($name)
    {
        $this->name = $name;
    }
}