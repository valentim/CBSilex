<?php
namespace RestHandler\DataTransfer\Response\Booking;

use Clickbus\RestHandler\DataTransfer\Response\Booking\AbstractBookingFactory;
use Clickbus\RestHandler\DataTransfer\Response\BookingDeleteDto;
use Clickbus\RestHandler\DataTransfer\Response\BookingDto;
use Clickbus\RestHandler\Response;

class AbstractBookingFactoryMethod extends \PHPUnit_Framework_TestCase
{
    protected $expectedBooking = array(
        "meta" => null,
        "content" => array(
            "id" => 123,
            "status" => "pending",
            "localizer" => "ABDDDD999",
            "uuid"  => "53347e09aee47",
            "payment" => array(
                "method" => "Credit Card",
                "total" => 3900,
                "currency" => "BRL",
                "status" => "pending",
                "meta" => array(
                    "card" => "XXXX-XXXX-XXXX-1234",
                    "code" => "XXX",
                    "name" => "Klederson Bueno Bezerra da Silva",
                    "expiration" => "XXXX-XX-XX"
                )
            ),
            "items" => [
                array(
                    "trip_id" => 123123123,
                    "order_item" => 1234,
                    "departure" => array(
                        "waypoint" => 113,
                        "schedule" => array(
                            "id" => 12,
                            "date" => "2014-10-31",
                            "time" => "10:00",
                            "timezone"  => "America/Sao_Paulo"
                        )
                    ),
                    "arrival" => array(
                        "waypoint" => 123,
                        "schedule" => array(
                            "id" => 15,
                            "date" => "2014-10-31",
                            "time" => "23:00",
                            "timezone" => "America/Sao_Paulo"
                        )
                    ),
                    "seat" => array(
                        "id" => 14,
                        "name" => "A01",
                        "price" => 1000,
                        "status"  => "pending",
                        "currency" => "BRL",
                        "type" => array(
                            "name" => "Professor",
                            "discount" => 0.9,
                            "id" => 1
                        )
                    ),
                    "passenger" => array(
                        "firstName" => "Klederson",
                        "lastName" => "Bueno",
                        "email" => "dev@clickbus.com.br",
                        "document" => "123.123.123-01",
                        "gender" => "M",
                        "birthday" => "1986-05-17",
                        "meta" => array()
                    ),
                    "products" => [
                        array(
                            "uuid" => "abcd123s",
                            "name" => "Potato Chips",
                            "quantity" => 2,
                            "price" => 500,
                            "currency" => "BRL"
                        )
                    ],
                    "subtotal" => 1900
                )
            ],
            "createdAt" => "2010-10-30"
        )
    );

    protected $expectedBookingDelete = array(
        "meta" => null,
        "content" => array(
            "id" => "AAABC123-AAACCC-DDDFFF23323-DDDAAFFF",
            "status" => "canceled",
            "localizer" => "ABDDDD999",
            "payment" => array(
                "method" => "Credit Card",
                "total" => 3900,
                "currency" => "BRL",
                "status" => "paid",
                "meta" => array(
                    "card" => "XXXX-XXXX-XXXX-1234",
                    "code" => "XXX",
                    "name" => "Klederson Bueno Bezerra da Silva",
                    "expiration" => "XXXX-XX-XX"
                ),
                "refund" => array(
                    "type"  => "partial",
                    "total"  => 2000
                )
            ),
            "items" => [
                array(
                    "order_item" => "EEAAAF-AAS@@22-KKKLLA1213-DA99DDD",
                    "subtotal" => 1900,
                    "status" => "error",
                    "messages" => [
                        "This ticket was already used, refund is not possible"
                    ]
                ),
            ]
        )
    );

    public function testBuildBooking()
    {
        $id = 123;
        $status = 'pending';
        $localizer = 'ABDDDD999';
        $uuid = '53347e09aee47';
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
            AbstractBookingFactory::buildItem(
                123123123,
                1234,
                12,
                '2014-10-31',
                '10:00',
                'America/Sao_Paulo',
                113,
                15,
                '2014-10-31',
                '23:00',
                'America/Sao_Paulo',
                123,
                'Professor',
                0.9,
                1,
                14,
                'A01',
                1000,
                'pending',
                'BRL',
                'Klederson',
                'Bueno',
                'dev@clickbus.com.br',
                '123.123.123-01',
                'M',
                '1986-05-17',
                array(),
                array(
                    AbstractBookingFactory::buildProduct('abcd123s', 'Potato Chips', 2, 500, 'BRL')
                ),
                1900
            )
        );

        $booking = AbstractBookingFactory::buildBooking(
            $id,
            $status,
            $localizer,
            $uuid,
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

        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Booking\Booking', $booking);

        $bookingDTO = new BookingDTO($booking);
        $response = new Response($bookingDTO);

        $this->assertEquals(
            json_encode($this->expectedBooking),
            json_encode($response)
        );
    }

    public function testBuildBookingDelete()
    {
        $card = 'XXXX-XXXX-XXXX-1234';
        $code = 'XXX';
        $name = 'Klederson Bueno Bezerra da Silva';
        $expiration = 'XXXX-XX-XX';
        $refundType = 'partial';
        $refundTotal = 2000;
        $paymentMethod = 'Credit Card';
        $paymentTotal = 3900;
        $paymentCurrency = 'BRL';
        $paymentStatus = 'paid';
        $items = array(
            AbstractBookingFactory::buildDeleteItem(
                'EEAAAF-AAS@@22-KKKLLA1213-DA99DDD',
                1900,
                'error',
                array('This ticket was already used, refund is not possible')
            ),
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
            $paymentStatus,
            $items,
            $refundType,
            $refundTotal,
            $card,
            $code,
            $name,
            $expiration
        );

        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Booking\BookingDelete', $booking);

        $bookingDeleteDTO = new BookingDeleteDTO($booking);
        $response = new Response($bookingDeleteDTO);

        $this->assertEquals(
            json_encode($this->expectedBookingDelete),
            json_encode($response)
        );
    }
}