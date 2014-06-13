<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/9/14
 * Time: 12:55
 */

namespace Clickbus\BusServiceLayer\BookingEngineService\Service;


use Clickbus\BusServiceLayer\BookingEngineService\BookingEngineDriver;
use Clickbus\BusServiceLayer\DataTransfer\TransferInterface;
use GuzzleHttp\Exception\ServerException;
use Clickbus\BusServiceLayer\BookingEngineService\Driver\ServerException as ServerExceptionCallBack;

abstract class AbstractService
{
    protected $adapter;
    protected $result;

    public function __construct(BookingEngineDriver $adapter)
    {
        $this->adapter = $adapter;
    }

    public function __call($method, $args)
    {
        if (!method_exists($this, $method)) {
            throw new NotExistsMethodException('Method not exists');
        }

        try {
            call_user_func_array(array($this, $method), $args);
        } catch (ServerException $e) {
            throw new ServerExceptionCallBack($e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return $this;
    }

    public function getResult()
    {
        return $this->adapter->getResult();
    }

    abstract protected function getSearch(TransferInterface $dataTransfer);
    abstract protected function getSeats(TransferInterface $dataTransfer);
    abstract protected function reserve(TransferInterface $dataTransfer);
    abstract protected function doBooking(TransferInterface $dataTransfer);
} 