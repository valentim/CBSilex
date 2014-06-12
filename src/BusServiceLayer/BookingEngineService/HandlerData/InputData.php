<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/8/14
 * Time: 11:44
 */

namespace Clickbus\BusServiceLayer\BookingEngineService\HandlerData;


use Clickbus\BusServiceLayer\BookingEngineService\Transfer;
use Clickbus\Request\Input;

class InputData implements Transfer, Input
{
    protected $body;
    protected $queryString;
    protected $method;

    public function setBody(array $contentBody)
    {
        $this->body = $contentBody;
    }

    public function setQueryString(array $contetQueryString)
    {
        $this->queryString = $contetQueryString;
    }

    public function getData()
    {
        $data = [
            'body' => $this->body,
            'queryString' => $this->queryString
        ];

        return $data;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function setMethod($method)
    {
        $this->method = $method;
    }
}