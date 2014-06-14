<?php
namespace Clickbus\RestHandler\DTO;

use Clickbus\RestHandler\Dto;
use Clickbus\RestHandler\DTO\Booking\BookingDelete;

class BookingDeleteDTO implements Dto
{
    public $content;

    public function __construct(BookingDelete $bookingDelete)
    {
        $this->content = $bookingDelete;
    }
}