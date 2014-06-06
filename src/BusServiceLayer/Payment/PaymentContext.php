<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 1:26
 */

namespace Clickbus\BusServiceLayer\Payment;

class PaymentContext implements Payment
{
    protected $paymentAdapter;

    public function __construct(Gateway $paymentAdapter)
    {
        $this->paymentAdapter = $paymentAdapter;
    }

    public function verifyPayment(PaymentTransfer $dataTransfer)
    {
        $this->paymentAdapter->verifyPayment($dataTransfer);
    }

    public function doPayment(PaymentTransfer $dataTransfer)
    {
        $this->paymentAdapter->doPayment($dataTransfer);
    }

    public function doCancelation(PaymentTransfer $dataTransfer)
    {
        $this->paymentAdapter->doCancelation($dataTransfer);
    }
}