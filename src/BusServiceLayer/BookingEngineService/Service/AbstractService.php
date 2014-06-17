<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/9/14
 * Time: 12:55
 */

namespace Clickbus\BusServiceLayer\BookingEngineService\Service;


use Clickbus\BusServiceLayer\BookingEngineService\BookingEngineDriverInterface;
use Clickbus\BusServiceLayer\BookingEngineService\Service\Exception\NotExistsMethodException;
use Clickbus\RestHandler\DataTransfer\Request\Booking\BookingRequest;
use Clickbus\RestHandler\DataTransfer\Request\Seat\SeatBlockRequest;
use Clickbus\RestHandler\DataTransfer\Request\Trip\PortfolioRequest;
use Clickbus\RestHandler\DataTransfer\Request\Search\SearchRequest;
use Clickbus\BusServiceLayer\BookingEngineService\Driver\Exception\ServerException as ServerExceptionCallBack;
use GuzzleHttp\Exception\ServerException;

abstract class AbstractService
{
    protected $adapter;
    protected $result;

    public function __construct(BookingEngineDriverInterface $adapter)
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

    abstract protected function getSearch(SearchRequest $dataTransfer);
    abstract protected function getSeats(PortfolioRequest $dataTransfer);
    abstract protected function seatBlock(SeatBlockRequest $dataTransfer);
    abstract protected function doBooking(BookingRequest $dataTransfer);
} 