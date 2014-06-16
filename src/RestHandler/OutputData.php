<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/10/14
 * Time: 1:37
 */

namespace Clickbus\RestHandler;

use Clickbus\BusServiceLayer\BookingEngineService\Service\NotExistsMethodException;

class OutputData implements OutputInterface
{
    protected $result;

    public function getResult()
    {
        return $this->result;
    }

    public function getFactory($output)
    {
        if (!method_exists($this, $output)) {
            throw new NotExistsMethodException('Method not exists');
        }

        return call_user_func_array(array($this, $output), []);
    }

    public function setOutput(array $data)
    {
        $this->result = $data;
    }

    protected function callBooking()
    {
        return [

        ];
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
        return 'Clickbus\RestHandler\DTO\Search\AbstractSearchFactory';
    }
}