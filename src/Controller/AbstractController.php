<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/9/14
 * Time: 15:19
 */

namespace Clickbus\Controller;


use Clickbus\BusServiceLayer\BookingEngineService\HandlerData\InputData;
use Clickbus\BusServiceLayer\BookingEngineService\Service\Exception\NotExistsMethodException;
use Clickbus\BusServiceLayer\BookingEngineService\Service\Exception\NotExistsServiceException;
use Clickbus\HandlerData\DataBinding;
use Clickbus\RestHandler\DataTransfer\TransferInterface;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractController
{
    /**
     * @param TransferInterface $dataTransfer
     * @param $data
     *
     * @return TransferInterface
     */
    protected function getTransfer(TransferInterface $dataTransfer, $data)
    {
        $binding = new DataBinding($dataTransfer);
        $binding->bindData($data);

        return $binding->getObject();
    }

    /**
     * @param Application $app
     * @param Request $request
     *
     * @return mixed
     *
     * @throws \Clickbus\BusServiceLayer\BookingEngineService\Service\Exception\NotExistsServiceException
     */
    protected function getBookingEngine(Application $app, Request $request)
    {
        $meta = $request->get('meta');

        if (isset($meta['bookingengine']) && isset($app[$meta['bookingengine']])) {
            $bookingEngine = $app[$meta['bookingengine']];

            return $bookingEngine;
        }

        throw new NotExistsServiceException;
    }

    /**
     * @param Application $app
     * @param Request $request
     *
     * @return mixed
     *
     * @throws \Clickbus\BusServiceLayer\BookingEngineService\Service\Exception\NotExistsServiceException
     */
    public function getPayment(Application $app, Request $request)
    {
        $paymentMethod = $request->get('request')['buyer']['payment']['method'];
        $availablePayments = $app['config']['payments'];

        if (isset($availablePayments[$paymentMethod]) && count($availablePayments[$paymentMethod]) > 0) {
            $driver = $availablePayments[$paymentMethod][0];
            $serviceName = strtolower("payment_gateway_driver_{$paymentMethod}_{$driver}");

            return $app[$serviceName];
        }

        throw new NotExistsServiceException;
    }
} 