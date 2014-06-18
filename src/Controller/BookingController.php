<?php
namespace Clickbus\Controller;

use Clickbus\RestHandler\DataTransfer\Request\Booking\BookingRequest;
use Symfony\Component\HttpFoundation\Request;

use Silex\Application;

class BookingController extends AbstractController
{
    public function postAction(Application $app, Request $request)
    {
        
    }

    public function putAction(Application $app, Request $request)
    {
        $bookingEngine = $this->getBookingEngine($app, $request);
        $bookingTransfer = $this->getTransfer(new BookingRequest, $request->getRequest()->all());

        $response = $bookingEngine->doBooking($bookingTransfer);

        return $app->json($response->getResult(), 200);
    }

    public function getAction(Application $app, Request $request, $guide)
    {
        return $app->json([], 200);
    }

    public function deleteAction(Application $app, Request $request, $guide)
    {
        return $app->json([], 200);
    }
}
