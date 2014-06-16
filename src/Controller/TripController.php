<?php
namespace Clickbus\Controller;

use Clickbus\DataTransfer\Request\Trip\PortfolioRequest;
use Symfony\Component\HttpFoundation\Request;

use Silex\Application;

class TripController extends AbstractController
{
    public function portfolioAction(Application $app, Request $request, $from, $to, $date)
    {
        $bookingEngine = $this->getBookingEngine($app, $request);
        $dataTransfer = $this->getInput($request);
        $dataTransfer->setTransferType(new PortfolioRequest);
        $dataTransfer->setQueryString([
            'from' => $from,
            'to' => $to,
            'date' => $date
        ]);
        $response = $bookingEngine->getSeats($dataTransfer->getData());

        return $app->json($response->getResult(), 200);
    }
}
