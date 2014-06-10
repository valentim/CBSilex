<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 2:58
 */

namespace Clickbus\BusServiceLayer\BookingEngineService;


use Clickbus\BusServiceLayer\BookingEngineService\HandlerData\DataFilter;
use Clickbus\Response\Output;

abstract class Template extends HandlerData
{
    protected $template;

    public function __construct(DataFilter $filter)
    {
        parent::__construct();
        $this->filter = $filter;
    }

    public function getSearch(Transfer $searchTransfer)
    {
        $this->template = $this->output->getTemplate('callSearch');
        $this->filterData($searchTransfer);
        $this->callSearch($this->output);
    }

    public function getSeats(Transfer $searchTransfer)
    {
        $this->template = $this->output->getTemplate('callSeats');
        $this->filterData($searchTransfer);
        $this->callSeats($this->output);
    }

    public function reserve(Transfer $searchTransfer)
    {
        $this->template = $this->output->getTemplate('callReserve');
        $this->filterData($searchTransfer);
        $this->callReserve($this->output);
    }

    public function doBooking(Transfer $searchTransfer)
    {
        $this->template = $this->output->getTemplate('callBooking');
        $this->filterData($searchTransfer);
        $this->callBooking($this->output);
    }

    abstract protected function callBooking(Output $output);
    abstract protected function callReserve(Output $output);
    abstract protected function callSeats(Output $output);
    abstract protected function callSearch(Output $output);
    abstract protected function getData();
}