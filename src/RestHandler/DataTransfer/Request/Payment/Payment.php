<?php
/**
 * Created by PhpStorm.
 * User: tiagobutzke
 * Date: 6/23/14
 * Time: 10:37 AM
 */

namespace Clickbus\RestHandler\DataTransfer\Request\Payment;


use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Payment extends AbstractTransferBehavior
{
    protected $method;
    protected $currency;
    protected $total;
    protected $installment;
    protected $meta;

    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setInstallment($installment)
    {
        $this->installment = $installment;
    }

    public function getInstallment()
    {
        return $this->installment;
    }

    public function setMeta(Meta $meta)
    {
        $this->meta = $meta;
    }

    public function getMeta()
    {
        return $this->meta;
    }
} 