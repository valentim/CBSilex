<?php
namespace Clickbus\Controller;

use Symfony\Component\HttpFoundation\Request;

use Silex\Application;

class BookingController extends AbstractController
{
    public function putAction(Application $app, Request $request)
    {
        $bookingEngine = $this->getBookingEngine($app, $request);
        $dataTransfer = $this->getData($request, 'put');
        $response = $bookingEngine->doBooking($dataTransfer);

        return $app->json($response->getResult(), 200);
    }

    public function getAction(Application $app, Request $request, $guide)
    {
        $bookingEngine = $this->getBookingEngine($app, $request);
        $dataTransfer = $this->getData($request, 'get');
        $response = $bookingEngine->doBooking($dataTransfer);

        return $app->json($response->getResult(), 200);
    }

    public function deleteAction(Application $app, Request $request, $guide)
    {
        $bookingEngine = $this->getBookingEngine($app, $request);
        $dataTransfer = $this->getData($request, 'delete');
        $response = $bookingEngine->doBooking($dataTransfer);

        return $app->json($response->getResult(), 200);
    }
}
