<?php
namespace Clickbus\Controller;

use Clickbus\DataTransfer\Request\Trip\TripRequest;
use Symfony\Component\HttpFoundation\Request;

use Silex\Application;

class SearchController extends AbstractController
{
    public function getAction(Application $app, Request $request)
    {
        $bookingEngine = $this->getBookingEngine($app, $request);
        $dataTransfer = $this->getInput($request);
        $dataTransfer->setTransferType(new TripRequest);

        $response = $bookingEngine->getSearch($dataTransfer->getData());

        return $app->json($response->getResult(), 200);
    }
}
