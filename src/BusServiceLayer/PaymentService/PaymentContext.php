<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 1:26
 */

namespace Clickbus\BusServiceLayer\PaymentService;

class PaymentContext implements PaymentInterface
{
    protected $paymentAdapter;

    public function __construct(GatewayInterface $paymentAdapter)
    {
        $this->paymentAdapter = $paymentAdapter;
    }

    public function verifyPayment(PaymentTransferInterface $dataTransfer)
    {
        $this->paymentAdapter->verifyPayment($dataTransfer);
    }

    public function doPayment(PaymentTransferInterface $dataTransfer)
    {
        $this->paymentAdapter->doPayment($dataTransfer);
    }

    public function doCancelation(PaymentTransferInterface $dataTransfer)
    {
        $this->paymentAdapter->doCancelation($dataTransfer);
    }
}