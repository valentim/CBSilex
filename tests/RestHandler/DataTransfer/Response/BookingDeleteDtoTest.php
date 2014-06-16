<?php
namespace RestHandler\DataTransfer\Response;

use Clickbus\RestHandler\Response;
use Clickbus\RestHandler\DataTransfer\Response\BookingDeleteDto;
use Clickbus\RestHandler\DataTransfer\Response\Booking\BookingDelete;
use Clickbus\RestHandler\DataTransfer\Response\Booking\PaymentDelete;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Meta;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Refund;
use Clickbus\RestHandler\DataTransfer\Response\Booking\DeleteItem;

class BookingDeleteDtoTest extends \PHPUnit_Framework_TestCase
{
    protected $bookingDeleteDTO;

    protected $expected = array(
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

    public function setUp()
    {
        $meta = new Meta();
        $meta->setCard('XXXX-XXXX-XXXX-1234');
        $meta->setCode('XXX');
        $meta->setName('Klederson Bueno Bezerra da Silva');
        $meta->setExpiration('XXXX-XX-XX');

        $refund = new Refund();
        $refund->setType('partial');
        $refund->setTotal(2000);

        $payment = new PaymentDelete();
        $payment->setMethod('Credit Card');
        $payment->setTotal(3900);
        $payment->setCurrency('BRL');
        $payment->setStatus('paid');
        $payment->setMeta($meta);
        $payment->setRefund($refund);

        $item = new DeleteItem();
        $item->setOrderItem('EEAAAF-AAS@@22-KKKLLA1213-DA99DDD');
        $item->setSubtotal(1900);
        $item->setStatus('error');
        $item->addMessage('This ticket was already used, refund is not possible');

        $bookingDelete = new BookingDelete();
        $bookingDelete->setId('AAABC123-AAACCC-DDDFFF23323-DDDAAFFF');
        $bookingDelete->setStatus('canceled');
        $bookingDelete->setLocalizer('ABDDDD999');
        $bookingDelete->setPayment($payment);
        $bookingDelete->addItem($item);

        $this->bookingDeleteDTO = new BookingDeleteDto($bookingDelete);
    }

    public function testResponseFormat()
    {
        $response = new Response($this->bookingDeleteDTO);

        $this->assertEquals(
            json_encode($this->expected),
            json_encode($response)
        );
    }
}
