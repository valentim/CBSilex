<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 1:14
 */

namespace Clickbus\BusServiceLayer\PaymentService\Adapter;


use Clickbus\BusServiceLayer\PaymentService\Driver\BankTransferDriverInterface;
use Clickbus\BusServiceLayer\PaymentService\GatewayInterface;
use Clickbus\BusServiceLayer\PaymentService\PaymentTransferInterface;

class BankTransferAdapter implements GatewayInterface
{
    protected $driver;

    public function __construct(BankTransferDriverInterface $driver)
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