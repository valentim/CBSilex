<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 2:58
 */

namespace Clickbus\BusServiceLayer\BookingEngineService;


use Clickbus\BusServiceLayer\BookingEngineService\HandlerData\DataFilter;

abstract class Adaptable implements BookingEngineAdapter
{
    private $filter;
    protected $myData;
    protected $data;

    public function __construct(DataFilter $filter)
    {
        $this->filter = $filter;
    }

    public function getSearch(Transfer $searchTransfer)
    {
        $this->filterData($searchTransfer);

        return $this->callSearch();
    }

    public function getSeats(Transfer $searchTransfer)
    {
        $this->filterData($searchTransfer);

        return $this->callSeats();
    }

    public function reserve(Transfer $searchTransfer)
    {
        $this->filterData($searchTransfer);

        return $this->callReserve();
    }

    public function doBooking(Transfer $searchTransfer)
    {
        $this->filterData($searchTransfer);

        return $this->callBooking();
    }

    private function filterData(Transfer $data)
    {
        $this->setInternalData($data);

        $this->filter->filter($data->getData(), $this->myData);
    }

    private function setInternalData(Transfer $searchTransfer)
    {
        if ($this->data) {
            return;
        }
        $this->data = $searchTransfer;
    }

    abstract protected function callBooking();
    abstract protected function callReserve();
    abstract protected function callSeats();
    abstract protected function callSearch();
}