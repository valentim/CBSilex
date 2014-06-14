<?php
namespace Clickbus\RestHandler\DTO\Booking;

use Clickbus\RestHandler\DTO\Booking\Booking;
use Clickbus\RestHandler\DTO\Booking\BookingDelete;
use Clickbus\RestHandler\DTO\Booking\DeleteItem;

class AbstractBookingFactory
{
    public static function buildBooking()
    {
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