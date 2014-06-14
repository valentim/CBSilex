<?php
namespace Clickbus\RestHandler\DTO\Booking;

class Meta
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