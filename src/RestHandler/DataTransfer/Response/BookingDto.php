<?php
namespace Clickbus\RestHandler\DataTransfer\Response;

use Clickbus\RestHandler\DtoInterface;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Booking;

class BookingDto implements DtoInterface
{
    public $content;

    public function __construct(Booking $booking)
    {
        $this->content = $booking;
    }
}