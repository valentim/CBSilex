<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 1:13
 */

namespace Clickbus\BusServiceLayer\Payment\Adapter;


use Clickbus\BusServiceLayer\Payment\Driver\BankSlipDriver;
use Clickbus\BusServiceLayer\Payment\Gateway;
use Clickbus\BusServiceLayer\Payment\PaymentTransfer;

class BankSlipAdapter implements Gateway
{
    protected $driver;

    public function __construct(BankSlipDriver $driver)
    {
        $this->driver = $driver;
    }

    public function verifyPayment(PaymentTransfer $dataTransfer)
    {
        $this->driver->verifyPayment($dataTransfer);
    }

    public function doPayment(PaymentTransfer $dataTransfer)
    {
        $this->driver->doPayment($dataTransfer);
    }

    public function doCancelation(PaymentTransfer $dataTransfer)
    {
        $this->driver->doCancelation($dataTransfer);
    }
}