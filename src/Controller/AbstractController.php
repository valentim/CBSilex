<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/9/14
 * Time: 15:19
 */

namespace Clickbus\Controller;


use Clickbus\BusServiceLayer\BookingEngineService\HandlerData\DataDTO;
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
        $bookingEngine = $app['booking_engine_driver_cbconnect'];

        return $bookingEngine;
    }
} 