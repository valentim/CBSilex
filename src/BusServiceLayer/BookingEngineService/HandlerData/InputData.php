<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/8/14
 * Time: 11:44
 */

namespace Clickbus\BusServiceLayer\BookingEngineService\HandlerData;


use Clickbus\RestHandler\DataTransfer\TransferInterface;
use Clickbus\Request\DataBinding;
use Clickbus\Request\InputInterface;

class InputData implements TransferInterface, InputInterface
{
    protected $body;
    protected $queryString;
    protected $transferData;

    public function setBody(array $contentBody)
    {
        $this->body = $contentBody;
    }

    public function setQueryString(array $contetQueryString)
    {
        $this->queryString = $contetQueryString;
    }

    public function setTransferType(TransferInterface $type)
    {
        $this->transferData = new DataBinding($type);
    }

    public function getData()
    {
        if (!isset($this->queryString['request'])) {
            $this->queryString['request'] = $this->queryString;
        }

        $data = array_merge(['meta' => null], $this->queryString, $this->body);
        $this->transferData->bindData($data['request']);
        $request = new Request;
        $request->setMeta($data['meta']);
        $request->setRequest($this->transferData->getObject());

        return $request;
    }
}