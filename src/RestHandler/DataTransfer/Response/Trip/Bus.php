<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Trip;

class Bus
{
    public $id;

    public $name;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}