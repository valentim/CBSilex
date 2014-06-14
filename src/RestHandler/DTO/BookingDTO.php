<?php
namespace Clickbus\RestHandler\DTO;

use Clickbus\RestHandler\Dto;
use Clickbus\RestHandler\DTO\Booking\Booking;

class BookingDTO implements Dto
{
    public $content;

    public function __construct(Booking $booking)
    {
        $this->content = $booking;
    }
}