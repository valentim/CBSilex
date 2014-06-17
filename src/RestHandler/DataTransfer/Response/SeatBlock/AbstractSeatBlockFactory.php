<?php
namespace Clickbus\RestHandler\DataTransfer\Response\SeatBlock;

use Clickbus\HandlerData\DataBinding;

abstract class AbstractSeatBlockFactory
{
    public static function bindData($data)
    {
        $transform = new DataBinding(new SeatBlockContainer);
        $transform->bindData($data);

        return $transform->getObject();
    }
}
