<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 2:58
 */

namespace Clickbus\BusServiceLayer\BookingEngineService;


use Clickbus\Response\Output;

abstract class Template extends HandlerData
{
    protected $template;

    public function getSearch(Transfer $searchTransfer)
    {
        $this->setData($searchTransfer);
        $this->template = $this->output->getTemplate('callSearch');
        $this->callSearch($this->output);
    }

    public function getSeats(Transfer $searchTransfer)
    {
        $this->setData($searchTransfer);
        $this->template = $this->output->getTemplate('callSeats');
        $this->callSeats($this->output);
    }

    public function reserve(Transfer $searchTransfer)
    {
        $this->setData($searchTransfer);
        $this->template = $this->output->getTemplate('callReserve');
        $this->callReserve($this->output);
    }

    public function doBooking(Transfer $searchTransfer)
    {
        $this->setData($searchTransfer);
        $this->template = $this->output->getTemplate('callBooking');
        $this->callBooking($this->output);
    }

    protected function setData(Transfer $searchTransfer)
    {
        $this->data = $searchTransfer->getData();
    }

    abstract protected function callBooking(Output $output);
    abstract protected function callReserve(Output $output);
    abstract protected function callSeats(Output $output);
    abstract protected function callSearch(Output $output);
}