<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/10/14
 * Time: 1:37
 */

namespace Clickbus\BusServiceLayer\BookingEngineService\HandlerData;

use Clickbus\BusServiceLayer\BookingEngineService\Service\Exception\NotExistsMethodException;
use Clickbus\HandlerData\OutputInterface;

class OutputData implements OutputInterface
{
    protected $result;

    public function getResult()
    {
        return $this->result;
    }

    public function getFactory($type)
    {
        if (!method_exists($this, $type)) {
            throw new NotExistsMethodException('Method not exists');
        }

        return call_user_func_array(array($this, $type), []);
    }

    public function setOutput($data)
    {
        $this->result = $data;
    }

    protected function callBooking()
    {

    }

    protected function callReserve()
    {
        return [

        ];
    }

    protected function callSeats()
    {
        return [

        ];
    }

    protected function callSearch()
    {
        return 'Clickbus\RestHandler\DataTransfer\Response\Search\AbstractSearchFactory';
    }
}