<?php
namespace Clickbus\RestHandler\DTO\Search;

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