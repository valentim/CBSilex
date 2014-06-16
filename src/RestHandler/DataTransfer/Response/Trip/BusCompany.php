<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Trip;

class BusCompany
{
    public $name;

    public function setName($name)
    {
        $this->name = $name;
    }
}