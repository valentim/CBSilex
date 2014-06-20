<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Booking;


use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Meta extends AbstractTransferBehavior
{
    public $card;

    public $code;

    public $name;

    public $expiration;

    public function setCard($card)
    {
        $this->card = $card;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setExpiration($expiration)
    {
        $this->expiration = $expiration;
    }
}