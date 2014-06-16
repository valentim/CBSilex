<?php
namespace RestHandler\DataTransfer\Response;

use Clickbus\RestHandler\Response;
use Clickbus\RestHandler\DataTransfer\Response\BookingDto;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Booking;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Payment;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Meta;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Item;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Departure;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Arrival;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Seat;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Type;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Passenger;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Product;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Schedule;

class BookingDtoTest extends \PHPUnit_Framework_TestCase
{
    protected $bookingDTO;

    protected $expected = array(
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

    public function setUp()
    {
        $meta = new Meta();
        $meta->setCard('XXXX-XXXX-XXXX-1234');
        $meta->setCode('XXX');
        $meta->setName('Klederson Bueno Bezerra da Silva');
        $meta->setExpiration('XXXX-XX-XX');

        $payment = new Payment();
        $payment->setMethod('Credit Card');
        $payment->setTotal(3900);
        $payment->setCurrency('BRL');
        $payment->setStatus('pending');
        $payment->setMeta($meta);

        $schedule = new Schedule();
        $schedule->setId(12);
        $schedule->setDate('2014-10-31');
        $schedule->setTime('10:00');
        $schedule->setTimezone('America/Sao_Paulo');

        $departure = new Departure();
        $departure->setWaypoint(113);
        $departure->setSchedule($schedule);

        $arrivalSchedule = new Schedule();
        $arrivalSchedule->setId(15);
        $arrivalSchedule->setDate('2014-10-31');
        $arrivalSchedule->setTime('23:00');
        $arrivalSchedule->setTimezone('America/Sao_Paulo');

        $arrival = new Arrival();
        $arrival->setWaypoint(123);
        $arrival->setSchedule($arrivalSchedule);

        $type = new Type();
        $type->setName('Professor');
        $type->setDicount(0.9);
        $type->setId(1);

        $seat = new Seat();
        $seat->setId(14);
        $seat->setName('A01');
        $seat->setPrice(1000);
        $seat->setStatus('pending');
        $seat->setCurrency('BRL');
        $seat->setType($type);

        $passenger = new Passenger();
        $passenger->setFirstName('Klederson');
        $passenger->setLastName('Bueno');
        $passenger->setEmail('dev@clickbus.com.br');
        $passenger->setDocument('123.123.123-01');
        $passenger->setGender('M');
        $passenger->setBirthday('1986-05-17');
        $passenger->setMeta(array());

        $product = new Product();
        $product->setUuid('abcd123s');
        $product->setName('Potato Chips');
        $product->setQuantity(2);
        $product->setPrice(500);
        $product->setCurrency('BRL');

        $item = new Item();
        $item->setTripId(123123123);
        $item->setOrderItem(1234);
        $item->setDeparture($departure);
        $item->setArrival($arrival);
        $item->setSeat($seat);
        $item->setPassenger($passenger);
        $item->addProduct($product);
        $item->setSubtotal(1900);

        $booking = new Booking();
        $booking->setId(123);
        $booking->setStatus('pending');
        $booking->setLocalizer('ABDDDD999');
        $booking->setUuid('53347e09aee47');
        $booking->setPayment($payment);
        $booking->addItem($item);
        $booking->setCreatedAt('2010-10-30');

        $this->bookingDTO = new BookingDto($booking);
    }

    public function testResponseFormat()
    {
        $response = new Response($this->bookingDTO);

        $this->assertEquals(
            json_encode($this->expected),
            json_encode($response)
        );
    }
}
