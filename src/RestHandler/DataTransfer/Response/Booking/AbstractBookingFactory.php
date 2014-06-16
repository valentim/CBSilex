<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Booking;

use Clickbus\RestHandler\DataTransfer\Response\Booking\Meta;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Payment;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Schedule;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Departure;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Arrival;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Type;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Seat;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Passenger;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Product;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Item;
use Clickbus\RestHandler\DataTransfer\Response\Booking\Booking;
use Clickbus\RestHandler\DataTransfer\Response\Booking\BookingDelete;
use Clickbus\RestHandler\DataTransfer\Response\Booking\DeleteItem;

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
    ) {
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
                $booking->addItem($item);
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
    ) {
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
                $bookingDelete->addItem($item);
            }
        }

        return $bookingDelete;
    }

    public static function buildProduct($uuid, $name, $quantity, $price, $currency)
    {
        $product = new Product();
        $product->setUuid($uuid);
        $product->setName($name);
        $product->setQuantity($quantity);
        $product->setPrice($price);
        $product->setCurrency($currency);

        return $product;
    }

    public static function buildItem(
        $tripId,
        $orderItem,
        $departureScheduleId,
        $departureScheduleDate,
        $departureScheduleTime,
        $departureScheduleTimezone,
        $departureWaypoint,
        $arrivalScheduleId,
        $arrivalScheduleDate,
        $arrivalScheduleTime,
        $arrivalScheduleTimezone,
        $arrivalWaypoint,
        $typeName,
        $typeDiscount,
        $typeId,
        $seatId,
        $seatName,
        $seatPrice,
        $seatStatus,
        $seatCurrency,
        $passengerFirstName,
        $passengerLastName,
        $passengerEmail,
        $passengerDocument,
        $passengerGender,
        $passengerBirthday,
        $passengerMeta,
        array $products,
        $subtotal
    ) {
        $item = new Item();
        $item->setTripId($tripId);
        $item->setOrderItem($orderItem);

        $departureSchedule = new Schedule();
        $departureSchedule->setId($departureScheduleId);
        $departureSchedule->setDate($departureScheduleDate);
        $departureSchedule->setTime($departureScheduleTime);
        $departureSchedule->setTimezone($departureScheduleTimezone);
        $departure = new Departure();
        $departure->setWaypoint($departureWaypoint);
        $departure->setSchedule($departureSchedule);

        $arrivalSchedule = new Schedule();
        $arrivalSchedule->setId($arrivalScheduleId);
        $arrivalSchedule->setDate($arrivalScheduleDate);
        $arrivalSchedule->setTime($arrivalScheduleTime);
        $arrivalSchedule->setTimezone($arrivalScheduleTimezone);
        $arrival = new Arrival();
        $arrival->setWaypoint($arrivalWaypoint);
        $arrival->setSchedule($arrivalSchedule);

        $type = new Type();
        $type->setId($typeId);
        $type->setDicount($typeDiscount);
        $type->setName($typeName);

        $seat = new Seat();
        $seat->setId($seatId);
        $seat->setName($seatName);
        $seat->setPrice($seatPrice);
        $seat->setStatus($seatStatus);
        $seat->setCurrency($seatCurrency);
        $seat->setType($type);

        $passenger = new Passenger();
        $passenger->setFirstName($passengerFirstName);
        $passenger->setLastName($passengerLastName);
        $passenger->setEmail($passengerEmail);
        $passenger->setDocument($passengerDocument);
        $passenger->setGender($passengerGender);
        $passenger->setBirthday($passengerBirthday);
        $passenger->setMeta($passengerMeta);

        $item->setDeparture($departure);
        $item->setArrival($arrival);
        $item->setSeat($seat);
        $item->setPassenger($passenger);
        $item->setSubtotal($subtotal);

        if (count($products) > 0) {
            foreach ($products as $product) {
                $item->addProduct($product);
            }
        }

        return $item;
    }

    public static function buildDeleteItem($orderItem, $subtotal, $status, array $messages)
    {
        $item = new DeleteItem();
        $item->setOrderItem($orderItem);
        $item->setSubtotal($subtotal);
        $item->setStatus($status);

        if (count($messages > 0)) {
            foreach ($messages as $message) {
                $item->addMessage($message);
            }
        }

        return $item;
    }
}