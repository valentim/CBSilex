<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 1:11
 */

namespace Clickbus\BusServiceLayer\PaymentService\Adapter;


use Clickbus\BusServiceLayer\PaymentService\Driver\CreditCardDriverInterface;
use Clickbus\BusServiceLayer\PaymentService\GatewayInterface;
use Clickbus\BusServiceLayer\PaymentService\PaymentTransferInterface;
use Clickbus\RestHandler\DataTransfer\Request\Payment\PaymentRequest;

class CreditCardAdapter implements GatewayInterface
{
    protected $driver;

    public function __construct(CreditCardDriverInterface $driver)
    {
        $this->driver = $driver;
    }

    public function verifyPayment(PaymentTransferInterface $dataTransfer)
    {
        $this->driver->verifyPayment($dataTransfer);
    }

    public function doPayment(PaymentRequest $dataTransfer)
    {
        $this->driver->doPayment($dataTransfer);
    }

    public function doCancelation(PaymentTransferInterface $dataTransfer)
    {
        $this->driver->doCancelation($dataTransfer);
    }
}