<?php
namespace Clickbus\RestHandler\DTO\Booking;

use Clickbus\RestHandler\DTO\Booking\Meta;
use Clickbus\RestHandler\DTO\Booking\Payment;
use Clickbus\RestHandler\DTO\Booking\Schedule;
use Clickbus\RestHandler\DTO\Booking\Departure;
use Clickbus\RestHandler\DTO\Booking\Arrival;
use Clickbus\RestHandler\DTO\Booking\Type;
use Clickbus\RestHandler\DTO\Booking\Seat;
use Clickbus\RestHandler\DTO\Booking\Passenger;
use Clickbus\RestHandler\DTO\Booking\Product;
use Clickbus\RestHandler\DTO\Booking\Item;
use Clickbus\RestHandler\DTO\Booking\Booking;
use Clickbus\RestHandler\DTO\Booking\BookingDelete;
use Clickbus\RestHandler\DTO\Booking\DeleteItem;

class AbstractBookingFactory
{
    public static function buildBooking(
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
        array $items
    )
    {
        $meta = new Meta();
        $meta->setCard($card);
        $meta->setCode($code);
        $meta->setName($name);
        $meta->setExpiration($expiration);

        $payment = new Payment();
        $payment->setMethod($paymentMethod);
        $payment->setTotal($paymentTotal);
        $payment->setCurrency($paymentCurrency);
        $payment->setStatus($paymentStatus);
        $payment->setMeta($meta);

        $type = new Type();
        $type->setName($typeName);
        $type->setDicount($typeDicount);
        $type->setId($typeId);

        $booking = new Booking();
        $booking->setId($id);
        $booking->setStatus($status);
        $booking->setLocalizer($localizer);
        $booking->setUuid($uuid);
        $booking->setPayment($payment);
        $booking->setCreatedAt($createdAt);

        if (count($items) > 0) {
            foreach ($items as $item) {
                $bookingItem = new Item();
                $bookingItem->setTripId($item['tripId']);
                $bookingItem->setOrderItem($item['orderItem']);

                $departureSchedule = new Schedule();
                $departureSchedule->setId($item['departure']['schedule']['id']);
                $departureSchedule->setDate($item['departure']['schedule']['date']);
                $departureSchedule->setTime($item['departure']['schedule']['time']);
                $departureSchedule->setTimezone($item['departure']['schedule']['timezone']);
                $departure = new Departure();
                $departure->setWaypoint($item['departure']['waypoint']);
                $departure->setSchedule($departureSchedule);

                $arrivalSchedule = new Schedule();
                $arrivalSchedule->setId($item['arrival']['schedule']['id']);
                $arrivalSchedule->setDate($item['arrival']['schedule']['date']);
                $arrivalSchedule->setTime($item['arrival']['schedule']['time']);
                $arrivalSchedule->setTimezone($item['arrival']['schedule']['timezone']);
                $arrival = new Arrival();
                $arrival->setWaypoint($item['arrival']['waypoint']);
                $arrival->setSchedule($arrivalSchedule);

                $type = new Type();
                $type->setId($item['type']['id']);
                $type->setDicount($item['type']['discount']);
                $type->setName($item['type']['name']);

                $seat = new Seat();
                $seat->setId($item['seat']['id']);
                $seat->setName($item['seat']['name']);
                $seat->setPrice($item['seat']['price']);
                $seat->setStatus($item['seat']['status']);
                $seat->setCurrency($item['seat']['currency']);
                $seat->setType($type);

                $passenger = new Passenger();
                $passenger->setFirstName($item['passenger']['firstName']);
                $passenger->setLastName($item['passenger']['lastName']);
                $passenger->setEmail($item['passenger']['email']);
                $passenger->setDocument($item['passenger']['document']);
                $passenger->setGender($item['passenger']['gender']);
                $passenger->setBirthday($item['passenger']['birthday']);
                $passenger->setMeta($item['passenger']['meta']);

                $bookingItem->setDeparture($departure);
                $bookingItem->setArrival($arrival);
                $bookingItem->setSeat($seat);
                $bookingItem->setPassenger($passenger);
                $bookingItem->setSubtotal($item['subtotal']);

                if (count($item['products']) > 0) {
                    foreach ($item['products'] as $product) {
                        $bookingProduct = new Product();
                        $bookingProduct->setUuid($product['uuid']);
                        $bookingProduct->setName($product['name']);
                        $bookingProduct->setQuantity($product['quantity']);
                        $bookingProduct->setPrice($product['price']);
                        $bookingProduct->setCurrency($product['currency']);
                        $bookingItem->addProduct($bookingProduct);
                    }
                }

                $booking->addItem($bookingItem);
            }
        }

        return $booking;
    }

    public static function buildBookingDelete(
        $id,
        $status,
        $localizer,
        $paymentMethod,
        $paymentTotal,
        $paymentCurrency,
        $paymentStauts,
        array $items,
        $refundType,
        $refundTotal,
        $card,
        $code,
        $name,
        $expiration
    )
    {
        $meta = new Meta();
        $meta->setCard($card);
        $meta->setCode($code);
        $meta->setName($name);
        $meta->setExpiration($expiration);

        $refund = new Refund();
        $refund->setType($refundType);
        $refund->setTotal($refundTotal);

        $payment = new PaymentDelete();
        $payment->setMethod($paymentMethod);
        $payment->setTotal($paymentTotal);
        $payment->setCurrency($paymentCurrency);
        $payment->setStatus($paymentStauts);
        $payment->setMeta($meta);
        $payment->setRefund($refund);

        $bookingDelete = new BookingDelete();
        $bookingDelete->setId($id);
        $bookingDelete->setStatus($status);
        $bookingDelete->setLocalizer($localizer);
        $bookingDelete->setPayment($payment);

        if (count($items) > 0) {
            foreach ($items as $item) {
                $bookingDeleteItem = new DeleteItem();
                $bookingDeleteItem->setOrderItem($item['orderItem']);
                $bookingDeleteItem->setSubtotal($item['subtotal']);
                $bookingDeleteItem->setStatus($item['status']);

                if (count($item['messages'] > 0)) {
                    foreach ($item['messages'] as $message) {
                        $bookingDeleteItem->addMessage($message);
                    }
                }
                $bookingDelete->addItem($bookingDeleteItem);
            }
        }

        return $bookingDelete;
    }
}