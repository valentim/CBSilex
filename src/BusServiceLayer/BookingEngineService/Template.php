<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 2:58
 */

namespace Clickbus\BusServiceLayer\BookingEngineService;


use Clickbus\RestHandler\DataTransfer\TransferInterface;
use Clickbus\RestHandler\OutputInterface;

abstract class Template extends HandlerData
{
    protected $factory;

    public function getSearch(TransferInterface $searchTransfer)
    {
        $this->setData($searchTransfer);
        $this->factory = $this->output->getFactory('callSearch');
        $this->callSearch($this->output);
    }

    public function getSeats(TransferInterface $searchTransfer)
    {
        $this->setData($searchTransfer);
        $this->factory = $this->output->getFactory('callSeats');
        $this->callSeats($this->output);
    }

    public function reserve(TransferInterface $searchTransfer)
    {
        $this->setData($searchTransfer);
        $this->factory = $this->output->getFactory('callReserve');
        $this->callReserve($this->output);
    }

    public function doBooking(TransferInterface $searchTransfer)
    {
        $this->setData($searchTransfer);
        $this->factory = $this->output->getFactory('callBooking');
        $this->callBooking($this->output);
    }

    protected function setData(TransferInterface $searchTransfer)
    {
        $this->data = $searchTransfer;
    }

    abstract protected function callBooking(OutputInterface $output);
    abstract protected function callReserve(OutputInterface $output);
    abstract protected function callSeats(OutputInterface $output);
    abstract protected function callSearch(OutputInterface $output);
}