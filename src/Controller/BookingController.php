<?php
namespace Clickbus\Controller;

use Clickbus\RestHandler\DataTransfer\Request\Booking\BookingRequest;
use Symfony\Component\HttpFoundation\Request;

use Silex\Application;

class BookingController extends AbstractController
{
    public function putAction(Application $app, Request $request)
    {
        $transfer = $this->getTransfer(new BookingRequest, $request->request->all());

        $bookingEngine = $this->getBookingEngine($app, $request);
        $response = $bookingEngine->doBooking($transfer);
        $payment = $this->getPayment($app, $request);
        $paymentResponse = $payment->doPayment($transfer);
        var_dump($paymentResponse->getResult());
        die;

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
