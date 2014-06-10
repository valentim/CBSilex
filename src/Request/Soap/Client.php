<?php
namespace Clickbus\Request\Soap;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Message\Response;

class Client extends \SoapClient
{
    /**
     * @var \Guzzle\Http\Message\Request
     */
    protected $request = null;

    /**
     * @var \Guzzle\Http\Message\Response
     */
    protected $response = null;

    /**
     * @var array
     */
    protected $locationReplace = null;

    /**
     * @var bool
     */
    protected $isResponse = false;

    /**
     * @param $wsdl
     * @param array $options
     * @param null $locationReplace
     */
    public function __construct($wsdl, array $options = null, $locationReplace = null)
    {
        parent::SoapClient($wsdl, $options);
        $this->locationReplace = $locationReplace;
    }

    /**
     * Method overridden to get the Soap XML Request and to provide the Soap XML response to the __soapCall
     *
     * @param string $request
     * @param string $location
     * @param string $action
     * @param int $version
     * @param int $one_way
     *
     * @return \Guzzle\Http\EntityBodyInterface|string
     */
    public function __doRequest($request, $location, $action, $version, $one_way = 0)
    {
        if ($this->isResponse) {
            return $this->response->getBody(true);

        } else {
            if ($this->locationReplace !== null && count($this->locationReplace) == 2) {
                $location = str_replace($this->locationReplace[0], $this->locationReplace[1], $location);
            }

            $headers = [
                'Connection' => 'Close',
                'User-Agent' => 'RocketSoapGuzzleClient/1.0',
                'Content-Type' => 'text/xml',
                'SOAPAction' => '"'. $action . '"',
                'Expect' => null
            ];

            $client = new GuzzleClient();
            $this->request = $client->createRequest('POST', $location, $headers, $request);

            return '';
        }
    }

    /**
     * Prepare a guzzle request to the action
     *
     * @param $action
     * @param $parameters
     *
     * @return \Guzzle\Http\Message\Request
     */
    public function prepare($action, $parameters)
    {
        $this->isResponse = false;
        $this->__soapCall($action, [ $parameters ]);

        return $this->request;
    }

    /**
     * Execute a guzzle response and returns the Soap response
     *
     * @param Response $response
     *
     * @return mixed
     */
    public function execute(Response $response)
    {
        $this->isResponse = true;
        $this->response = $response;

        $action = preg_replace('/"(?:.+?:)?(.+?)"/', '\1', $response->getRequest()->getHeader('SOAPAction'));
        return $this->__soapCall($action, []);
    }
}