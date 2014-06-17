<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Search;

use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Product extends AbstractTransferBehavior
{
    public $uuid;

    public $name;

    public $price;

    public $currency;

    public $avaliable;

    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function setAvaliable($avaliable)
    {
        $this->avaliable = $avaliable;
    }
}