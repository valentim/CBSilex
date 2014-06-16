<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/15/14
 * Time: 23:53
 */

namespace Controller;


class TripControllerTest extends AbstractWebTest
{
    public function testCorrectResponse()
    {
        $client = $this->createClient();
        $client->request('GET','/api/v2/trip/portfolio/2a6578da-9db4-48d5-9191-1f9524c9d043/cd7bc748-131d-4900-b04a-019f7e1234b2/2014-10-10?meta[bookingengine]=booking_engine_driver_cbconnect');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
 