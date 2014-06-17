<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Booking;

use Clickbus\HandlerData\DataBinding;

class AbstractBookingFactory
{
    public static function bindData($data)
    {
        $transform = new DataBinding(new BookingContainer);
        $transform->bindData($data);

        return $transform->getObject();
    }
}