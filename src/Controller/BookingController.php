<?php
namespace Clickbus\Controller;

use Clickbus\RestHandler\DataTransfer\Request\Booking\BookingRequest;
use Clickbus\RestHandler\DataTransfer\Request\Payment\PaymentRequest;
use Symfony\Component\HttpFoundation\Request;

use Silex\Application;

class BookingController extends AbstractController
{
    public function putAction(Application $app, Request $request)
    {
        $bookingTransfer = $this->getTransfer(new BookingRequest, $request->request->all());
        $bookingEngine = $this->getBookingEngine($app, $request);
        $response = $bookingEngine->doBooking($bookingTransfer);

        $paymentTransfer = $this->getTransfer(new PaymentRequest, $request->request->all());
        $payment = $this->getPayment($app, $request);
        $paymentResponse = $payment->doPayment($paymentTransfer);

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
