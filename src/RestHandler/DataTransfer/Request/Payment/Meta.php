<?php
/**
 * Created by PhpStorm.
 * User: tiagobutzke
 * Date: 6/23/14
 * Time: 10:22 AM
 */

namespace Clickbus\RestHandler\DataTransfer\Request\Payment;


use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class Meta extends AbstractTransferBehavior
{
    /**
     * @var string
     */
    protected $card;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $expiration;

    /**
     * @var string
     */
    protected $zipcode;

    public function setCard($card)
    {
        $this->card = $card;
    }

    public function getCard()
    {
        return $this->card;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setExpiration($expiration)
    {
        $this->expiration = $expiration;
    }

    public function getExpiration()
    {
        return $this->expiration;
    }

    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    public function getZipcode()
    {
        return $this->zipcode;
    }
}
