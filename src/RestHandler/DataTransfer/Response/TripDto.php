<?php
namespace Clickbus\RestHandler\DataTransfer\Response;

use Clickbus\RestHandler\DtoInterface;
use Clickbus\RestHandler\DataTransfer\Response\Trip\Trip;

class TripDto implements DtoInterface
{
    public $content;

    public function __construct(Trip $trip)
    {
        $this->content = $trip;
    }
}