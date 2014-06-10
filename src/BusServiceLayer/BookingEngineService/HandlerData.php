<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/10/14
 * Time: 1:21
 */

namespace Clickbus\BusServiceLayer\BookingEngineService;


use Clickbus\Response\OutputData;

abstract class HandlerData implements BookingEngineDriver
{
    protected $output;
    protected $filter;
    protected $data;

    public function __construct()
    {
        $this->output = new OutputData;
    }

    public function getResult()
    {
        return $this->output->getResult();
    }

    protected function filterData(Transfer $data)
    {
        $this->setInternalData($data);

        $this->filter->filter($data->getData(), $this->getData());
    }

    protected function setInternalData(Transfer $searchTransfer)
    {
        if ($this->data) {
            return;
        }
        $this->data = $searchTransfer;
    }
} 