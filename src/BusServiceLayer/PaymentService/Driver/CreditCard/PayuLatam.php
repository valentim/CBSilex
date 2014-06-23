<?php
namespace Clickbus\BusServiceLayer\PaymentService\Driver\CreditCard;

use Clickbus\BusServiceLayer\PaymentService\Driver\CreditCardDriverInterface;
use Clickbus\BusServiceLayer\PaymentService\PaymentTransferInterface;
use Clickbus\RestHandler\DataTransfer\Request\Payment\PaymentRequest;

class PayuLatam implements CreditCardDriverInterface
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
    protected $merchantId;

    /**
     * @var string
     */
    protected $accountId;

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
     * @var string
     */
    protected $currency;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var bool
     */
    protected $test;

    /**
     * Constructor
     * 
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->apiKey = $config['api_key'];
        $this->apiLogin = $config['api_login'];
        $this->merchantId = $config['merchant_id'];
        $this->accountId = $config['account_id'];
        $this->currency = $config['currency'];
        $this->country = $config['country'];
        $this->responseUrl = $config['response_url'];
        $this->language = $config['language'];
    }

    /**
     * Verify Payment
     * 
     * @param  \Clickbus\BusServiceLayer\PaymentService\PaymentTransferInterface $dataTransfer
     * 
     * @return array
     */
    public function verifyPayment(PaymentTransferInterface $dataTransfer)
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
     * @param \Clickbus\RestHandler\DataTransfer\Request\Payment\PaymentRequest $dataTransfer
     *
     * @return array
     */
    public function doPayment(PaymentRequest $dataTransfer)
    {
        $request = $dataTransfer->getRequest();

        $buyer = $request->getBuyer();
        $payment = $buyer->getPayment();
        $orderItems = $request->getOrderItems();
        $referenceCode = 'Us code to reference in notifications'; // OrderId

        $merchant = array(
            'apiLogin' => $this->apiLogin,
            'apiKey' => $this->apiKey
        );

        $shippingAddress = array(
//            'street1' => 'Calle 93 B 17 – 25',
//            'city' => 'Bogotá',
//            'state' => 'Cundinamarca',
//            'country' => 'CO',
//            'phone' => '5582254'
        );

        $payuBuyer = array(
            'fullName' => "{$buyer->getFirstName()} {$buyer->getLastName()}",
            'emailAddress' => $buyer->getEmail(),
            'dniNumber' => $buyer->getDocument(),
            'shippingAddress' => $shippingAddress
        );

        $txValue = array(
            'value' => $payment->getTotal(),
            'currency' => $this->currency
        );

        $order = array(
            'accountId' => $this->accountId,
            'referenceCode' => $referenceCode,
            'description' => 'Test order Colombia',
            'language' => $this->language,
            'notifyUrl' => $this->notifyUrl,
            'signature' => $this->getSignature($referenceCode, $payment->getTotal()),
            'buyer' => $payuBuyer,
            'additionalValues' => array(
                'TX_VALUE' => $txValue
            )
        );

        $creditCard = array(
            'number' => $payment->getMeta()->getCard(),
            'securityCode' => $payment->getMeta()->getCode(),
            'expirationDate' => $payment->getMeta()->getExpiration(),
            'name' => $payment->getMeta()->getName()
        );

        $payer = array(
            'fullName' => $payment->getMeta()->getName(),
            'emailAddress' => $buyer->getEmail()
        );

        $extraParameters = array(
            'installmentsNumber' => $payment->getInstallment(),
            'responseUrl' => $this->responseUrl
        );

        $transaction = array(
            'order' => $order,
            'creditCard' => $creditCard,
            'type' => self::AUTHORIZATION_AND_CAPTURE,
            'paymentMethod' => self::PAYMENT_METHOD_VISA,
            'paymentCountry' => $this->country,
            'payer' => $payer,
            'ipAddress' => '127.0.0.1',
            'userAgent' => 'Firefox',
            'extraParameters' => $extraParameters
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
     * Cancel a payment
     * 
     * @param  \Clickbus\BusServiceLayer\PaymentService\PaymentTransferInterface $dataTransfer
     * 
     * @return array
     */
    public function doCancelation(PaymentTransferInterface $dataTransfer)
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
    private function getSignature($referenceCode, $txValue)
    {
        return md5("{$this->apiKey}~{$this->merchantId}~{$referenceCode}~{$txValue}~{$this->currency}");
    }

    /**
     * Send a post request
     *
     * @param  string $url
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
