<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/15/14
 * Time: 23:53
 */

namespace Controller;


class SeatblockControllerTest extends AbstractWebTest
{
    public function testCorrectResponse()
    {
        $data = '{
              "meta": {},
              "request": {
                  "from":"2a6578da-9db4-48d5-9191-1f9524c9d043",
                  "to": "cd7bc748-131d-4900-b04a-019f7e1234b2",
                  "seat": "",
                  "schedule": {
                    "id": "e5b193ca-f11e-4108-887c-9656edf91611",
                    "date": "2014-06-23",
                    "time": "07:00",
                    "timezone": "Pakistan Time Zone (UTC +5)"
                  },
                  "sessionId": "DDFF999-AAACCC-DDDFFF@113-AFAFDD"
               }
            }';
//        $client = $this->createClient();
//        $client->request('PUT','/api/v2/seat/block/?meta[bookingengine]=booking_engine_driver_cbconnect', json_decode($data, true));
//
//        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
 