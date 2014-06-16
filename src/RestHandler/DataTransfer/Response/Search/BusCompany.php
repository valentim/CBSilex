<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Search;

class BusCompany
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