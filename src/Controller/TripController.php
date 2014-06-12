<?php
namespace Clickbus\Controller;

use Symfony\Component\HttpFoundation\Request;

use Silex\Application;

class TripController extends AbstractController
{
    public function portfolioAction(Application $app, Request $request, $from, $to, $date)
    {
        $bookingEngine = $this->getBookingEngine($app, $request);
        $dataTransfer = $this->getData($request, 'get');
        $dataTransfer->setQueryString([
            'from' => $from,
            'to' => $to,
            'date' => $date
        ]);
        $response = $bookingEngine->getSeats($dataTransfer);

        return $app->json($response->getResult(), 200);
    }
}
