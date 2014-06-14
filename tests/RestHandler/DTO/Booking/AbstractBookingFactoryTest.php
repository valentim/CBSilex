<?php
namespace RestHandler\DTO\Booking;

use Clickbus\RestHandler\DTO\Booking\AbstractBookingFactory;

class AbstractBookingFactoryMethod extends \PHPUnit_Framework_TestCase
{
    public function testBuildBooking()
    {
        $id = 123;
        $status = 'pending';
        $localizer = 'ABDDDD999';
        $uuid = '53347e09aee47';
        $payment = $payment;
        $createdAt = '2010-10-30';
        $card = 'XXXX-XXXX-XXXX-1234';
        $code = 'XXX';
        $name = 'Klederson Bueno Bezerra da Silva';
        $expiration = 'XXXX-XX-XX';
        $paymentMethod = 'Credit Card';
        $paymentTotal = 3900;
        $paymentCurrency = 'BRL';
        $paymentStatus = 'pending';
        $typeName = 'Professor';
        $typeDicount = 0.9;
        $typeId = 1;
        $items = array(
            array(
                'tripId' => 123123123,
                'orderItem' => 1234,
                'departure' => array(
                    'schedule' => array(
                        'id' => 15,
                        'date' => '2014-10-31',
                        'time' => '23:00',
                        'timezone' => 'America/Sao_Paulo',
                    ),
                    'waypoint' => 113,
                ),
                'arrival' => array(
                    'schedule' => array(
                        'id' => 15,
                        'date' => '2014-10-31',
                        'time' => '23:00',
                        'timezone' => 'America/Sao_Paulo',
                    ),
                    'waypoint' => 123,
                ),
                'type' => array(
                    'name' => 'Professor',
                    'dicount' => 0.9,
                    'id' => 1,
                ),
                'seat' => array(
                    'id' => 14,
                    'name' => 'A01',
                    'price' => 1000,
                    'status' => 'pending',
                    'currency' => 'BRL',
                ),
                'passenger' => array(
                    'firstName' => 'Klederson',
                    'lastName' => 'Bueno',
                    'email' => 'dev@clickbus.com.br',
                    'document' => '123.123.123-01',
                    'gender' => 'M',
                    'birthday' => '1986-05-17',
                    'meta' => array()
                ),
                'products' => array(
                    array(
                        'uuid' => 'abcd123s',
                        'name' => 'Potato Chips',
                        'quantity' => 2,
                        'price' => 500,
                        'currency' => 'BRL',
                    )
                ),
                'subtotal' => 1900,
            )
        );

        $booking = AbstractBookingFactory::buildBooking(
            $id,
            $status,
            $localizer,
            $uuid,
            $payment,
            $createdAt,
            $card,
            $code,
            $name,
            $expiration,
            $paymentMethod,
            $paymentTotal,
            $paymentCurrency,
            $paymentStatus,
            $typeName,
            $typeDicount,
            $typeId,
            $items
        );

        $this->assertInstanceOf('Clickbus\RestHandler\DTO\Booking\Booking', $booking);
    }

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

        $booking = AbstractBookingFactory::buildBookingDelete(
            $id,
            $status,
            $localizer,
            $paymentMethod,
            $paymentTotal,
            $paymentCurrency,
            $paymentStauts,
            $items,
            $refundType,
            $refundTotal,
            $card,
            $code,
            $name,
            $expiration
        );

        $this->assertInstanceOf('Clickbus\RestHandler\DTO\Booking\BookingDelete',
            $booking);
    }
}