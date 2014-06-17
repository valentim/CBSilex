<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Search;

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class BusCompany extends AbstractTransferBehavior
{
    public $name;

    public $id;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}