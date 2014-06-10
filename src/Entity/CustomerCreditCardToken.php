<?php

namespace Clickbus\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;

/**
 * Customer Credit Card Token
 *
 * @ORM\Table(name="customer_credit_card_tokens", indexes={@ORM\Index(name="idx_customer_id", columns={"customer_id"})})
 * @ORM\Entity(repositoryClass="\Clickbus\Repository\CustomerCreditCardTokenRepository")
 */
class CustomerCreditCardToken
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var \Clickbus\Entity\Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="creditCardTokens")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    protected $customer;

    /**
     * @var string
     *
     * @ORM\Column(name="holder_printed_name", type="string", nullable=false)
     */
    protected $holderPrintedName;

    /**
     * @var string
     *
     * @ORM\Column(name="masked_number", type="string", nullable=false)
     */
    protected $maskedNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="brand", type="string", nullable=false)
     */
    protected $brand;

    /**
     * @var string
     *
     * @ORM\Column(name="exp_month", type="string", nullable=false)
     */
    protected $expirationMonth;

    /**
     * @var string
     *
     * @ORM\Column(name="exp_year", type="string", nullable=false)
     */
    protected $expirationYear;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", nullable=false)
     */
    protected $token;

    /**
     * @ORM\Column(name="holder_identification_number", type="string", nullable=true)
     */
    protected $holderIdentificationNumber;

    /**
     * @ORM\Column(name="holder_full_name", type="string", nullable=true)
     */
    protected $holderFullName;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    protected $isActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     * @Behavior\Timestampable(on="create")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     * @Behavior\Timestampable(on="update")
     */
    protected $updatedAt;

    /**
     * Get ID
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get Customer
     * 
     * @return \Clickbus\Entity\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set Customer
     * 
     * @param \Clickbus\Entity\Customer $customer
     * @return \Clickbus\Entity\CustomerCreditCardToken
     */
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * Get Credit Card Holder Printed Name
     * 
     * @return string
     */
    public function getHolderPrintedName()
    {
        return $this->holderPrintedName;
    }

    /**
     * Set Credit Card Holder Printed Name
     * 
     * @param string $holderPrintedName
     * @return \Clickbus\Entity\CustomerCreditCardToken
     */
    public function setHolderPrintedName($holderPrintedName)
    {
        $this->holderPrintedName = $holderPrintedName;
        return $this;
    }

    /**
     * Get Credit Card Masked Number
     * 
     * @return string
     */
    public function getMaskedNumber()
    {
        return $this->maskedNumber;
    }

    /**
     * Set Credit Card Masked Number
     * 
     * @param string $maskedNumber
     * @return \Clickbus\Entity\CustomerCreditCardToken
     */
    public function setMaskedNumber($maskedNumber)
    {
        $this->maskedNumber = $maskedNumber;
        return $this;
    }

    /**
     * Get Credit Card Brand
     * 
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set Credit Card Brand
     * 
     * @param string $brand
     * @return \Clickbus\Entity\CustomerCreditCardToken
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
        return $this;
    }

    /**
     * Get Credit Card Expiration Month
     * 
     * @return string
     */
    public function getExpirationMonth()
    {
        return $this->expirationMonth;
    }

    /**
     * Set Credit Card Expiration Month
     * 
     * @param string $expirationMonth
     * @return \Clickbus\Entity\CustomerCreditCardToken
     */
    public function setExpirationMonth($expirationMonth)
    {
        $this->expirationMonth = $expirationMonth;
        return $this;
    }

    /**
     * Get Credit Card Expiration Year
     * 
     * @return string
     */
    public function getExpirationYear()
    {
        return $this->expirationYear;
    }

    /**
     * Set Credit Card Expiration Year
     * 
     * @param string $expirationYear
     * @return \Clickbus\Entity\CustomerCreditCardToken
     */
    public function setExpirationYear($expirationYear)
    {
        $this->expirationYear = $expirationYear;
        return $this;
    }

    /**
     * Get Credit Card Token
     * 
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set Credit Card Token
     * 
     * @param string $token
     * @return \Clickbus\Entity\CustomerCreditCardToken
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * Get Credit Card Holder Indentification Number
     * 
     * @return string
     */
    public function getHolderIdentificationNumber()
    {
        return $this->holderIdentificationNumber;
    }

    /**
     * Set Credit Card Holder Indentification Number
     * 
     * @param string $holderIdentificationNumber
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setHolderIdentificationNumber($holderIdentificationNumber)
    {
        $this->holderIdentificationNumber = $holderIdentificationNumber;
        return $this;
    }

    /**
     * Get Credit Card Holder Full Name
     * 
     * @return string
     */
    public function getHolderFullName()
    {
        return $this->holderFullName;
    }

    /**
     * Set Credit Card Holder Full Name
     * 
     * @param string $holderFullName
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setHolderFullName($holderFullName)
    {
        $this->holderFullName = $holderFullName;
        return $this;
    }

    /**
     * Get Is Credit Card Token Active?
     * 
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set Is Credit Card Token Active?
     * 
     * @param boolean $isActive
     * @return \Clickbus\Entity\CustomerCreditCardToken
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * Get Created At
     * 
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set Created At
     * 
     * @param \DateTime $createdAt
     * @return \Clickbus\Entity\CustomerCreditCardToken
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get Updated At
     * 
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set Updated At
     * 
     * @param \DateTime $updatedAt
     * @return \Clickbus\Entity\CustomerCreditCardToken
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
