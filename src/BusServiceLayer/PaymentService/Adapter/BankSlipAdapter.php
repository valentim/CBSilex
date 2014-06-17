<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 1:13
 */

namespace Clickbus\BusServiceLayer\PaymentService\Adapter;


use Clickbus\BusServiceLayer\PaymentService\Driver\BankSlipDriverInterface;
use Clickbus\BusServiceLayer\PaymentService\GatewayInterface;
use Clickbus\BusServiceLayer\PaymentService\PaymentTransferInterface;

class BankSlipAdapter implements GatewayInterface
{
    protected $driver;

    public function __construct(BankSlipDriverInterface $driver)
    {
        $this->driver = $driver;
    }

    public function verifyPayment(PaymentTransferInterface $dataTransfer)
    {
        $this->driver->verifyPayment($dataTransfer);
    }

    public function doPayment(PaymentTransferInterface $dataTransfer)
    {
        $this->driver->doPayment($dataTransfer);
    }

    public function doCancelation(PaymentTransferInterface $dataTransfer)
    {
        $this->driver->doCancelation($dataTransfer);
    }
}