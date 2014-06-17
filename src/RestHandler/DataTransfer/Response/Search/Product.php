<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Search;

<<<<<<< HEAD
class Product
=======
use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Product extends AbstractTransferBehavior
>>>>>>> added response objects
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