<?php
namespace Clickbus\Controller;

use Clickbus\RestHandler\DataTransfer\Request\Seat\BlockRequest;
use Symfony\Component\HttpFoundation\Request;

use Silex\Application;

class SeatblockController extends AbstractController
{
    public function sessionAction(Application $app, Request $request, $sessionId)
    {
        $bookingEngine = $this->getBookingEngine($app, $request);
        $dataTransfer = $this->getInput($request);
        $response = $bookingEngine->reserve($dataTransfer);

        return $app->json($response->getResult(), 200);
    }

    public function blockAction(Application $app, Request $request)
    {
        $bookingEngine = $this->getBookingEngine($app, $request);
        $dataTransfer = $this->getInput($request);
        $dataTransfer->setTransferType(new BlockRequest);

        $response = $bookingEngine->reserve($dataTransfer->getData());

        return $app->json($response->getResult(), 200);
    }
}
