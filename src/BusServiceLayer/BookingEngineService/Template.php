<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/6/14
 * Time: 2:58
 */

namespace Clickbus\BusServiceLayer\BookingEngineService;


use Clickbus\BusServiceLayer\DataTransfer\TransferInterface;
use Clickbus\Response\OutputInterface;

abstract class Template extends HandlerData
{
    protected $template;

    public function getSearch(TransferInterface $searchTransfer)
    {
        $this->setData($searchTransfer);
        $this->template = $this->output->getTemplate('callSearch');
        $this->callSearch($this->output);
    }

    public function getSeats(TransferInterface $searchTransfer)
    {
        $this->setData($searchTransfer);
        $this->template = $this->output->getTemplate('callSeats');
        $this->callSeats($this->output);
    }

    public function reserve(TransferInterface $searchTransfer)
    {
        $this->setData($searchTransfer);
        $this->template = $this->output->getTemplate('callReserve');
        $this->callReserve($this->output);
    }

    public function doBooking(TransferInterface $searchTransfer)
    {
        $this->setData($searchTransfer);
        $this->template = $this->output->getTemplate('callBooking');
        $this->callBooking($this->output);
    }

    protected function setData(TransferInterface $searchTransfer)
    {
        $this->data = $searchTransfer->getData();
    }

    abstract protected function callBooking(OutputInterface $output);
    abstract protected function callReserve(OutputInterface $output);
    abstract protected function callSeats(OutputInterface $output);
    abstract protected function callSearch(OutputInterface $output);
}