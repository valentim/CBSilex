<?php
/**
 * Created by PhpStorm.
 * User: tiagobutzke
 * Date: 6/23/14
 * Time: 9:30 AM
 */

namespace Clickbus\RestHandler\DataTransfer\Request\Payment;


use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class PaymentRequest extends AbstractTransferBehavior
{
    protected $meta;
    protected $request;

    /**
     * @param mixed $request
     */
    public function setRequest(PaymentBody $paymentBody)
{
    $this->request = $paymentBody;
}

    /**
     * @return mixed
     */
    public function getRequest()
{
    return $this->request;
}

    /**
     * @param mixed $meta
     */
    public function setMeta($meta)
{
    $this->meta = $meta;
}

    /**
     * @return mixed
     */
    public function getMeta()
{
    return $this->meta;
}
}