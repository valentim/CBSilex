<?php
namespace Clickbus\Controller;

use Clickbus\RestHandler\DataTransfer\Request\Trip\PortfolioRequest;
use Clickbus\RestHandler\DataTransfer\Request\Trip\Seat;
use Symfony\Component\HttpFoundation\Request;

use Silex\Application;

class TripController extends AbstractController
{
    public function portfolioAction(Application $app, Request $request, $from, $to, $date)
    {
        $data = [
            'from' => $from,
            'to' => $to,
            'date' => $date
        ];

        $bookingEngine = $this->getBookingEngine($app, $request);
        $portfolioTransfer = $this->getTransfer(new PortfolioRequest, $data);
        $response = $bookingEngine->getSeats($portfolioTransfer);

        return $app->json($response->getResult(), 200);
    }
}
