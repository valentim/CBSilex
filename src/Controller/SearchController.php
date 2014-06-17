<?php
namespace Clickbus\Controller;

use Clickbus\RestHandler\DataTransfer\Request\Trip\Trip;
use Symfony\Component\HttpFoundation\Request;

use Silex\Application;

class SearchController extends AbstractController
{
    public function getAction(Application $app, Request $request)
    {
        $bookingEngine = $this->getBookingEngine($app, $request);
        $dataTransfer = $this->getInput($request);
        $dataTransfer->setTransferType(new Trip);

        $response = $bookingEngine->getSearch($dataTransfer->getData());

        return $app->json($response->getResult(), 200);
    }
}
