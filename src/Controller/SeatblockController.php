<?php
namespace Clickbus\Controller;

use Symfony\Component\HttpFoundation\Request;

use Silex\Application;

class SeatblockController extends AbstractController
{
    public function sessionAction(Application $app, Request $request, $sessionId)
    {
        $bookingEngine = $this->getBookingEngine($app, $request);
        $dataTransfer = $this->getData($request, 'get');
        $response = $bookingEngine->reserve($dataTransfer);

        return $app->json($response, 200);
    }

    public function blockAction(Application $app, Request $request)
    {
        $bookingEngine = $this->getBookingEngine($app, $request);
        $dataTransfer = $this->getData($request, 'put');
        $response = $bookingEngine->reserve($dataTransfer);

        return $app->json($response, 200);
    }
}
