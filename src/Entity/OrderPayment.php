<?php

namespace Clickbus\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;
use Clickbus\Entity\BillingAddress;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Order Payment
 *
 * @ORM\Table(name="order_payments")
 * @ORM\Entity()
 */
class OrderPayment
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
     * @var \Clickbus\Entity\Order
     *
     * @ORM\OneToOne(targetEntity="Order", inversedBy="payment")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     */
    protected $order;

    /**
     * @var \Clickbus\Entity\BillingAddress
     *
     * @ORM\OneToOne(targetEntity="BillingAddress", mappedBy="orderPayment", cascade={"all"})
     */
    protected $billingAddress;

    /**
     * @ORM\Column(name="gateway_order_id", type="string", nullable=true)
     */
    protected $gatewayOrderId;

    /**
     * @ORM\Column(name="gateway_request_id", type="string", nullable=true)
     */
    protected $gatewayRequestId;
    
    /**
     * @ORM\Column(name="gateway_transaction_id", type="string", nullable=true)
     */
    protected $gatewayTransactionId;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $success;

    /**
     * @ORM\Column(name="authorization_code", type="string", nullable=true)
     */
    protected $authorizationCode;

    /**
     * @ORM\Column(name="acquirer_transaction_id", type="string", nullable=true)
     */
    protected $acquirerTransactionId;

    /**
     * @ORM\Column(name="acquirer_return_code", type="string", nullable=true)
     */
    protected $acquirerReturnCode;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $nsu;

    /**
     * @ORM\Column(name="return_message", type="string", nullable=true)
     */
    protected $returnMessage;

    /**
     * @ORM\Column(name="masked_credit_card_number", type="string", nullable=true)
     */
    protected $maskedCreditCardNumber;

    /**
     * @ORM\Column(name="credit_card_token", type="string", nullable=true)
     */
    protected $creditCardToken;

    /**
     * @ORM\Column(name="credit_card_brand", type="string", nullable=true)
     */
    protected $creditCardBrand;

    /**
     * @ORM\Column(name="holder_printed_name", type="string", nullable=true)
     */
    protected $holderPrintedName;

    /**
     * @ORM\Column(name="holder_identification_number", type="string", nullable=true)
     */
    protected $holderIdentificationNumber;

    /**
     * @ORM\Column(name="holder_full_name", type="string", nullable=true)
     */
    protected $holderFullName;

    /**
     * @ORM\Column(name="installment_count", type="integer", nullable=true)
     */
    protected $installmentCount;

    /**
     * @ORM\Column(name="gateway_transaction_reference", type="string", nullable=true)
     */
    protected $transactionReference;

    /**
     * @ORM\Column(name="identification_number", type="string", nullable=true)
     */
    protected $identificationNumber;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="bank_slip_bar_code", type="string", nullable=true)
     */
    protected $bankbarCode;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="bank_slip_url", type="string", nullable=true)
     */
    protected $bankSlipUrl;
    
    /**
     * @ORM\Column(name="bank_slip_expiration_business_days", type="integer", nullable=true)
     */
    protected $bankSlipExpirationBusinessDays;

    /**
     * @var string
     * 
     * @ORM\Column(name="bank", type="string", nullable=true)
     */
    protected $bank;
    
    /**
     * @var boolean
     * 
     * @ORM\Column(name="moip_response", type="boolean", options={"default" = false})
     */
    protected $moipResponse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Behavior\Timestampable(on="create")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     * @Behavior\Timestampable(on="update")
     */
    protected $updatedAt;
    
    /**
     * @var \String
     *
     * @ORM\Column(name="rejection_code", type="string", nullable=true)
     */
    protected $rejectionCode;
    
    /**
     * @var \String
     *
     * @ORM\Column(name="rejection_message", type="string", nullable=true)
     */
    protected $rejectionMessage;

    /**
     * Get ID
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get Order
     *
     * @return \Clickbus\Entity\Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set Order
     *
     * @param \Clickbus\Entity\Order $order
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setOrder(\Clickbus\Entity\Order $order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * Get Billing Address
     *
     * @return \Clickbus\Entity\BillingAddress
     */
    public function getBillingAddress() {
        return $this->billingAddress;
    }

    /**
     * Set the Billing Address.
     *
     * @param \Clickbus\Entity\BillingAddress $billingAddress
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setBillingAddress(BillingAddress $billingAddress) {
        $this->billingAddress = $billingAddress;
        return $this;
    }

    /**
     * Get Gateway Order ID
     *
     * @return string
     */
    public function getGatewayOrderId()
    {
        return $this->gatewayOrderId;
    }

    /**
     * Set Gateway Order ID
     *
     * @param string $gatewayOrderId
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setGatewayOrderId($gatewayOrderId)
    {
        $this->gatewayOrderId = $gatewayOrderId;
        return $this;
    }

    /**
     * Get Gateway Request ID
     *
     * @return string
     */
    public function getGatewayRequestId()
    {
        return $this->gatewayRequestId;
    }

    /**
     * Set Gateway Request ID
     *
     * @param string $gatewayOrderId
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setGatewayRequestId($gatewayRequestId)
    {
        $this->gatewayRequestId = $gatewayRequestId;
        return $this;
    }

    /**
     * Get Gateway Transaction ID
     *
     * @return string
     */
    public function getGatewayTransactionId() {
        return $this->gatewayTransactionId;
    }

    /**
     * Set Gateway Transaction ID
     *
     * @param string $gatewayTransactionId
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setGatewayTransactionId($gatewayTransactionId) {
        $this->gatewayTransactionId = $gatewayTransactionId;
        return $this;
    }

    /**
     * Get Success
     *
     * @return boolean
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * Set Success
     *
     * @param boolean $success
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setSuccess($success)
    {
        $this->success = $success;
        return $this;
    }

    /**
     * Get Authorization Code
     *
     * @return string
     */
    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

    /**
     * Set Authorization Code
     *
     * @param string $authorizationCode
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setAuthorizationCode($authorizationCode)
    {
        $this->authorizationCode = $authorizationCode;
        return $this;
    }

    /**
     * Get Acquirer Transaction ID
     *
     * @return string
     */
    public function getAcquirerTransactionId()
    {
        return $this->acquirerTransactionId;
    }

    /**
     * Set Acquirer Transaction ID
     *
     * @param string $acquirerTransactionId
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setAcquirerTransactionId($acquirerTransactionId)
    {
        $this->acquirerTransactionId = $acquirerTransactionId;
        return $this;
    }

    /**
     * Get Acquirer Return Code
     *
     * @return string
     */
    public function getAcquirerReturnCode()
    {
        return $this->acquirerReturnCode;
    }

    /**
     * Set Acquirer Return Code
     *
     * @param string $acquirerReturnCode
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setAcquirerReturnCode($acquirerReturnCode)
    {
        $this->acquirerReturnCode = $acquirerReturnCode;
        return $this;
    }

    /**
     * Get NSU
     *
     * @return string
     */
    public function getNsu()
    {
        return $this->nsu;
    }

    /**
     * Set NSU
     *
     * @param string $nsu
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setNsu($nsu)
    {
        $this->nsu = $nsu;
        return $this;
    }

    /**
     * Get Return Message
     *
     * @return string
     */
    public function getReturnMessage()
    {
        return $this->returnMessage;
    }

    /**
     * Set Return Message
     *
     * @param string $returnMessage
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setReturnMessage($returnMessage)
    {
        $this->returnMessage = $returnMessage;
        return $this;
    }

    /**
     * Get Masked Credit Card Number
     *
     * @return string
     */
    public function getMaskedCreditCardNumber()
    {
        return $this->maskedCreditCardNumber;
    }

    /**
     * Set Masked Credit Card Number
     *
     * @param string $maskedCreditCardNumber
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setMaskedCreditCardNumber($maskedCreditCardNumber)
    {
        $this->maskedCreditCardNumber = $maskedCreditCardNumber;
        return $this;
    }

    /**
     * Get Credit Card Token
     *
     * @return string
     */
    public function getCreditCardToken()
    {
        return $this->creditCardToken;
    }

    /**
     * Set Credit Card Token
     *
     * @param string $creditCardToken
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setCreditCardToken($creditCardToken)
    {
        $this->creditCardToken = $creditCardToken;
        return $this;
    }

    /**
     * Get Credit Card Brand
     *
     * @return string
     */
    public function getCreditCardBrand()
    {
        return $this->creditCardBrand;
    }

    /**
     * Set Credit Card Brand
     *
     * @param string $creditCardBrand
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setCreditCardBrand($creditCardBrand)
    {
        $this->creditCardBrand = $creditCardBrand;
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
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setHolderPrintedName($holderPrintedName)
    {
        $this->holderPrintedName = $holderPrintedName;
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
     * Get Installment Count
     *
     * @return int
     */
    public function getInstallmentCount() {
        return $this->installmentCount;
    }

    /**
     * Set Installment Count
     *
     * @param int $installmentCount
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setInstallmentCount($installmentCount) {
        $this->installmentCount = $installmentCount;
        return $this;
    }

    /**
     * Get the Transaction Reference
     *
     * @return string
     */
    public function getTransactionReference() {
        return $this->transactionReference;
    }

    /**
     * Set the Transaction Reference
     *
     * @param string $transactionReference
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setTransactionReference($transactionReference) {
        $this->transactionReference = $transactionReference;
        return $this;
    }

    /**
     * Get Bank Slip Customer Indentification Number
     *
     * @return string
     */
    public function getIdentificationNumber()
    {
        return $this->identificationNumber;
    }

    /**
     * Set Bank Slip Customer Indentification Number
     *
     * @param string $identificationNumber
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setIdentificationNumber($identificationNumber)
    {
        $this->identificationNumber = $identificationNumber;
        return $this;
    }

    /**
     * Get bank slip bar code
     *
     * @return string
     */
    public function getBankbarCode() {
        return $this->bankbarCode;
    }

    /**
     * Set bank slip bar code
     *
     * @param string $bankbarCode
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setBankbarCode($bankbarCode) {
        $this->bankbarCode = $bankbarCode;
        return $this;
    }

    /**
     * Get bank slip url
     *
     * @return string
     */
    public function getBankSlipUrl() {
        return $this->bankSlipUrl;
    }

    /**
     * Set bank slip url
     *
     * @param string $bankSlipUrl
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setBankSlipUrl($bankSlipUrl) {
        $this->bankSlipUrl = $bankSlipUrl;
        return $this;
    }

    /**
     * Get bank slip expiration business days ahead
     *
     * @return int
     */
    public function getBankSlipExpirationBusinessDays() {
        return $this->bankSlipExpirationBusinessDays;
    }
    
    /**
     * Get bank
     *
     * @return string
     */
    public function getBank() {
        return $this->bank;
    }

    /**
     * Set bank slip expiration business days ahead
     *
     * @param int $bankSlipExpirationBusinessDays
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setBankSlipExpirationBusinessDays($bankSlipExpirationBusinessDays) {
        $this->bankSlipExpirationBusinessDays = $bankSlipExpirationBusinessDays;
        return $this;
    }
    
    /**
     * Set bank
     *
     * @param string $bank
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setBank($bank) {
        $this->bank = $bank;
        return $this;
    }
    
    /**
     * Set moip response
     * 
     * @param boolean $moipResponse
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setMoipResponse($moipResponse) {
        $this->moipResponse = $moipResponse;
        return $this;
    }
    
    /**
     * Get Moip Response
     * 
     * @return boolean
     */
    public function getMoipResponse() {
        return $this->moipResponse;
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
     * @return \Clickbus\Entity\OrderPayment
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
     * Set Update At
     *
     * @param \DateTime $updatedAt
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
    
    /**
     * Get rejection Code
     *
     * @return string
     */
    public function getRejectionCode() {
        return $this->rejectionCode;
    }
    /**
     * Set Rejection Code At
     *
     * @param string $rejectionCode
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setRejectionCode($rejectionCode) {
        $this->rejectionCode = $rejectionCode;
        return $this;
    }

    /**
     * Get rejection code 
     *
     * @return string
     */
    public function getRejectionMessage() {
        return $this->rejectionMessage;
    }

    /**
     * Set Rejection Message At
     *
     * @param string $rejectionMessage
     * @return \Clickbus\Entity\OrderPayment
     */
    public function setRejectionMessage( $rejectionMessage) {
        $this->rejectionMessage = $rejectionMessage;
        return $this;
    }


}
