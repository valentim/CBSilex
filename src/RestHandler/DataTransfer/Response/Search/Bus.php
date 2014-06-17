<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Search;

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Bus extends AbstractTransferBehavior
{
    public $serviceClass;

    public $name;

    public $id;

    public function setServiceClass($serviceClass)
    {
        $this->serviceClass = $serviceClass;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}