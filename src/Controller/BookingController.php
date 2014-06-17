<?php
namespace Clickbus\Controller;

use Clickbus\RestHandler\DataTransfer\Request\Seat\Reservation;
use Symfony\Component\HttpFoundation\Request;

use Silex\Application;

class BookingController extends AbstractController
{
    public function putAction(Application $app, Request $request)
    {
        $bookingEngine = $this->getBookingEngine($app, $request);
        $dataTransfer = $this->getInput($request);
        $dataTransfer->setTransferType(new Reservation);

        $response = $bookingEngine->doBooking($dataTransfer->getData());

        return $app->json($response->getResult(), 200);
    }

    public function getAction(Application $app, Request $request, $guide)
    {
        $bookingEngine = $this->getBookingEngine($app, $request);
        $dataTransfer = $this->getInput($request);
        $response = $bookingEngine->doBooking($dataTransfer);

        return $app->json($response->getResult(), 200);
    }

    public function deleteAction(Application $app, Request $request, $guide)
    {
        $bookingEngine = $this->getBookingEngine($app, $request);
        $dataTransfer = $this->getInput($request);
        $response = $bookingEngine->doBooking($dataTransfer);

        return $app->json($response->getResult(), 200);
    }
}
