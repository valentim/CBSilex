<?php
/**
 * Created by PhpStorm.
 * User: tiagobutzke
 * Date: 6/18/14
 * Time: 4:07 PM
 */

namespace Driver\CreditCard;

use Clickbus\BusServiceLayer\PaymentService\Driver\CreditCard\PayuLatam;

class PayuLatamTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    public function setUp()
    {
        $config = array(
            'transaction_url' => 'http://stg.api.payulatam.com/payments-api/4.0/service.cgi',
            'reports_url' => 'https://stg.api.payulatam.com/reports-api/4.0/service.cgi',
            'api_key' => '6u39nqhq8ftd0hlvnjfs66eh8c',
            'api_login' => '11959c415b33d0c',
            'merchant_id' => 500238,
            'account_id' => 500538,
            'tx_value' => 3,
            'currency' => 'USD',
            'response_url' => 'http://www.api.dev/',
            'language' => 'en',
            'test' => true
        );
        $this->object = new PayuLatam($config);
    }

    public function testObjectTyp()
    {
        $this->assertInstanceOf('Clickbus\BusServiceLayer\PaymentService\Driver\CreditCard\PayuLatam', $this->object);
    }
}