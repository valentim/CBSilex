<?php
namespace Clickbus\BusServiceLayer\PaymentService\Driver\CreditCard;

use Clickbus\BusServiceLayer\PaymentService\Driver\CreditCardDriver;
use Clickbus\BusServiceLayer\PaymentService\PaymentTransfer;

class PayuLatam implements CreditCardDriver
{
    const TRANSACTION_TYPE_CANCELATION = 'VOID';

    const COMMAND_SUBMIT = 'SUBMIT_TRANSACTION';
    const COMMAND_ORDER_DETAIL_BY_REFERENCE_CODE = 'ORDER_DETAIL_BY_REFERENCE_CODE';

    const AUTHORIZATION_AND_CAPTURE = 'AUTHORIZATION_AND_CAPTURE';
    const PAYMENT_METHOD_VISA = 'VISA';

    /**
     * @var string
     */
    protected $apiLogin;

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var string
     */
    protected $transactionUrl;

    /**
     * @var string
     */
    protected $reportsUrl;

    /**
     * @var string
     */
    protected $notifyUrl;

    /**
     * @var string
     */
    protected $responseUrl;

    /**
     * @var string
     */
    protected $transaction;

    /**
     * @var float
     */
    protected $txValue;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var bool
     */
    protected $test;

    /**
     * Verify Payment
     * 
     * @param  Clickbus\BusServiceLayer\PaymentService\PaymentTransfer $dataTransfer
     * 
     * @return array
     */
    public function verifyPayment(PaymentTransfer $dataTransfer)
    {
        $merchant = array(
            'apiLogin' => $this->apiLogin,
            'apiKey' => $this->apiKey
        );

        $details = array(
            'referenceCode' => 'TestPayU'
        );

        $submit = array(
            'merchant' => $merchant,
            'command' => self::COMMAND_ORDER_DETAIL_BY_REFERENCE_CODE,
            'details' => $details,
            'language' => $this->language,
            'test' => $this->test
        );

        $response = $this->post($this->reportsUrl, $submit);

        return $response;
    }

    /**
     * Make payment call
     * 
     * @param  Clickbus\BusServiceLayer\PaymentService\PaymentTransfer $dataTransfer
     * 
     * @return array
     */
    public function doPayment(PaymentTransfer $dataTransfer)
    {
        $merchant = array(
            'apiLogin' => $this->apiLogin,
            'apiKey' => $this->apiKey
        );

        $shippingAddress = array(
            'street1' => 'Calle 93 B 17 – 25',
            'city' => 'Bogotá',
            'state' => 'Cundinamarca',
            'country' => 'CO',
            'phone' => '5582254'
        );

        $buyer = array(
            'fullName' => 'Tiago Butzke',
            'emailAddress' => 'tiago.butzke@clickbus.com.br',
            'dniNumber' => '1155255887',
            'shippingAddress' => $shippingAddress
        );

        $txValue = array(
            'value' => $this->txValue,
            'currency' => $this->currency
        );

        $order = array(
            'accountId' => $this->accountId,
            'referenceCode' => 'TestPayU',
            'description' => 'Test order Colombia',
            'language' => $this->language,
            'notifyUrl' => $this->notifyUrl,
            'signature' => $this->getSignature(),
            'buyer' => $buyer,
            'additionalValues' => array(
                'TX_VALUE' => $txValue
            )
        );

        $creditCard = array(
            'number' => '4111111111111111',
            'securityCode' => '737',
            'expirationDate' => '2016/06',
            'name' => 'Tiago Butzke'
        );

        $payer = array(
            'fullName' => 'Tiago Butzke',
            'emailAddress' => 'tiago.butzke@clickbus.com.br'
        );

        $extraParameters = array(
            'installmentsNumber' => 1,
            'responseUrl' => $this->responseUrl
        );

        $transaction = array(
            'order' => $order,
            'creditCard' => $creditCard,
            'type' => self::AUTHORIZATION_AND_CAPTURE,
            'paymentMethod' => self::VISA,
            'paymentCountry' => 'CO',
            'payer' => $payer,
            'ipAddress' => '127.0.0.1',
            'userAgent' => 'Firefox',
            'extraParameters' => $extraParameters
        );

        $submitTransaction = array(
            'language' => $this->language,
            'command' => self::SUBMIT_TRANSACTION,
            'merchant' => $merchant,
            'transaction' => $transaction,
            'test' => $this->test
        );

        $response = $this->post($this->transactionUrl, $submitTransaction);

        return $response;
    }

    /**
     * Cancel a payment
     * 
     * @param  Clickbus\BusServiceLayer\PaymentService\PaymentTransfer $dataTransfer
     * 
     * @return array
     */
    public function doCancelation(PaymentTransfer $dataTransfer)
    {
        $merchant = array(
            'apiLogin' => $this->apiLogin,
            'apiKey' => $this->apiKey
        );
        $order = array(
            'id' => 4148040
        );
        $transaction = array(
            'order' => $order,
            'type' => self::TRANSACTION_TYPE_CANCELATION,
            'parentTransactionId' => 'ef327562-1b50-46a8-8afe-cf582b5b4832'
        );
        $submitTransaction = array(
            'language' => $this->language,
            'command' => self::COMMAND_SUBMIT,
            'merchant' => $merchant,
            'transaction' => $transaction,
            'test' => $this->test
        );

        $response = $this->post($this->transactionUrl, $submitTransaction);

        return $response;
    }

    /**
     * Payu latam signature
     * 
     * @return string
     */
    private function getSignature()
    {
        return md5("{$this->apiKey}~{$this->merchantId}~{$this->referenceCode}~{$this->txValue}~{$this->currency}");
    }

    /**
     * Send a post request
     * 
     * @param  array $data
     * 
     * @return string
     */
    private function post($url, array $data)
    {
        $data = json_encode($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
        );

        return curl_exec($ch);
    }
}
