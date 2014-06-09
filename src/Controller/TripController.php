<?php
namespace Clickbus\Controller;

use Symfony\Component\HttpFoundation\Request;

use Silex\Application;

class TripController extends AbstractController
{
    public function portfolioAction(Application $app, Request $request)
    {
        $bookingEngine = $this->getBookingEngine($app, $request);
        $dataTransfer = $this->getData($request, 'get');
        $response = $bookingEngine->getSeats($dataTransfer);

        return $app->json($response, 200);
    }
}
