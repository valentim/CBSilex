<?php
namespace Clickbus\Controller;

use Clickbus\RestHandler\DataTransfer\Request\Seat\SeatBlockRequest;
use Symfony\Component\HttpFoundation\Request;

use Silex\Application;

class SeatBlockController extends AbstractController
{
    public function sessionAction(Application $app, Request $request, $sessionId)
    {
        return $app->json([], 200);
    }

    public function blockAction(Application $app, Request $request)
    {
        $bookingEngine = $this->getBookingEngine($app, $request);
        $seatBlockTransfer = $this->getTransfer(new SeatBlockRequest, $request->request->all());

        $response = $bookingEngine->seatBlock($seatBlockTransfer);

        return $app->json($response->getResult(), 200);
    }
}
