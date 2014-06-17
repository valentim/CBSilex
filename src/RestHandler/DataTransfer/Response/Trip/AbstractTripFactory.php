<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Trip;

use Clickbus\HandlerData\DataBinding;

abstract class AbstractTripFactory
{
    public static function bindData($data)
    {
        $transform = new DataBinding(new PortfolioContainer);
        $transform->bindData($data);

        return $transform->getObject();
    }
}
