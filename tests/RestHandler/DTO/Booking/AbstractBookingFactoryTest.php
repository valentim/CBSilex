<?php
namespace RestHandler\DTO\Booking;

use Clickbus\RestHandler\DTO\Booking\AbstractBookingFactory;

class AbstractBookingFactoryMethod extends \PHPUnit_Framework_TestCase
{
    public function testBuildBookingDelete()
    {
        $card = 'XXXX-XXXX-XXXX-1234';
        $code = 'XXX';
        $name = 'Klederson Bueno Bezerra da Silva';
        $expiration = 'XXXX-XX-XX';
        $type = 'partial';
        $total = 2000;
        $paymentMethod = 'Credit Card';
        $paymentTotal = 3900;
        $paymentCurrency = 'BRL';
        $paymentStatus = 'paid';
        $items = array(
            array(
                'orderItem' => 'EEAAAF-AAS@@22-KKKLLA1213-DA99DDD',
                'subtotal' => 1900,
                'status' => 'error',
                'messages' => array(
                    'This ticket was already used, refund is not possible'
                )
            )
        );
        $id = 'AAABC123-AAACCC-DDDFFF23323-DDDAAFFF';
        $status = 'canceled';
        $localizer = 'ABDDDD999';

        $booking = AbstractBookingFactory::buildBookingDelete($id, $status, $localizer, $paymentMethod, $paymentTotal, $paymentCurrency, $paymentStauts, $items, $refundType, $refundTotal, $card, $code, $name, $expiration);

        $this->assertInstanceOf('Clickbus\RestHandler\DTO\Booking\BookingDelete', $booking);
    }
}