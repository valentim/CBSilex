<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/9/14
 * Time: 15:19
 */

namespace Clickbus\Controller;


use Clickbus\BusServiceLayer\BookingEngineService\HandlerData\DataDTO;
use Clickbus\BusServiceLayer\BookingEngineService\Service\NotExistsServiceException;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractController
{
    protected function getData(Request $request, $method)
    {
        $dataTransfer = new DataDTO;
        $dataTransfer->setMethod($method);
        $dataTransfer->input($request->query->all());

        return $dataTransfer;
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