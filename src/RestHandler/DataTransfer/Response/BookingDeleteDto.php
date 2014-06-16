<?php
namespace Clickbus\RestHandler\DataTransfer\Response;

use Clickbus\RestHandler\DtoInterface;
use Clickbus\RestHandler\DataTransfer\Response\Booking\BookingDelete;

class BookingDeleteDto implements DtoInterface
{
    public $content;

    public function __construct(BookingDelete $bookingDelete)
    {
        $this->content = $bookingDelete;
    }
}