<?php
namespace Clickbus\Controller;

use Clickbus\BusServiceLayer\BookingEngineService\HandlerData\DataDTO;
use Symfony\Component\HttpFoundation\Request;

use Silex\Application;

class SearchController
{
    public function getAction(Application $app, Request $request)
    {
        $bookingEngine = $app['booking_engine_driver_cbconnect'];
        $dataTransfer = new DataDTO;
        $dataTransfer->input($request->query->all());

        $response = $bookingEngine->getSearch($dataTransfer);

        return $app->json($response, 200);
    }
}
