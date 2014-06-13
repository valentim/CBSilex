<?php
namespace Clickbus\RestHandler\DTO;

use Clickbus\RestHandler\Dto;
use Clickbus\RestHandler\DTO\Trip\Trip;

class TripDTO implements Dto
{
    public $content;

    public function __construct(Trip $trip)
    {
        $this->content = $trip;
    }
}