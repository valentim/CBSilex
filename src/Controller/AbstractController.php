<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/9/14
 * Time: 15:19
 */

namespace Clickbus\Controller;


use Clickbus\BusServiceLayer\BookingEngineService\HandlerData\InputData;
use Clickbus\BusServiceLayer\BookingEngineService\Service\Exception\NotExistsServiceException;
use Clickbus\HandlerData\DataBinding;
use Clickbus\RestHandler\DataTransfer\TransferInterface;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractController
{
    protected function getTransfer(TransferInterface $dataTransfer, $data)
    {
        $binding = new DataBinding($dataTransfer);
        $binding->bindData($data);

        return $binding->getObject();
    }

    protected function getBookingEngine(Application $app, Request $request)
    {
        $meta = $request->get('meta');

        if (isset($meta['bookingengine']) && isset($app[$meta['bookingengine']])) {
            $bookingEngine = $app[$meta['bookingengine']];

            return $bookingEngine;
        }

        throw new NotExistsServiceException;
    }
} 