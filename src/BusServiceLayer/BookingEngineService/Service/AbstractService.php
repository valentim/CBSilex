<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/9/14
 * Time: 12:55
 */

namespace Clickbus\BusServiceLayer\BookingEngineService\Service;


use Clickbus\BusServiceLayer\BookingEngineService\BookingEngineAdapter;
use Clickbus\BusServiceLayer\BookingEngineService\Transfer;
use GuzzleHttp\Exception\ServerException;
use Clickbus\BusServiceLayer\BookingEngineService\Driver\ServerException as ServerExceptionCallBack;

abstract class AbstractService
{
    protected $adapter;

    public function __construct(BookingEngineAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function __call($method, $args)
    {
        if (!method_exists($this, $method)) {
            throw new NotExistsMethodException('Method not exists');
        }

        try {
            return call_user_func_array(array($this, $method), $args);
        } catch (ServerException $e) {
            throw new ServerExceptionCallBack($e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    abstract protected function getSearch(Transfer $dataTransfer);
    abstract protected function getSeats(Transfer $dataTransfer);
    abstract protected function reserve(Transfer $dataTransfer);
    abstract protected function doBooking(Transfer $dataTransfer);
} 