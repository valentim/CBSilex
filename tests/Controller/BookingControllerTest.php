<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/15/14
 * Time: 23:53
 */

namespace Controller;


class BookingControllerTest extends AbstractWebTest
{

    public function testCorrectResponse()
    {
        $data = '{
              "meta":[],
              "request": {
                "sessionId": "DDFF999-AAACCC-DDDFFF@113-AFAFDD",
                "buyer": {
                  "firstName": "Klederson",
                  "lastName": "Bueno",
                  "email": "dev@clickbus.com.br",
                  "document": "123.123.123-11",
                  "gender": "M",
                  "birthday": "",
                  "meta":[]
                },
                "orderItems": [
                  {
                    "seatReservation": "DDFF999-AAACCC-DDDFFF@113-AFAFDD",
                    "passenger": {
                      "firstName": "Klederson",
                      "lastName": "Bueno",
                      "email": "dev@clickbus.com.br",
                      "document": "123.123.123-01",
                      "gender": "M",
                      "birthday": "1986-05-17",
                      "meta":[]
                    },
                    "products":[]
                  }
                ]
               }
             }';
//        $client = $this->createClient();
//        $client->request('PUT','/api/v2/booking/?meta[bookingengine]=booking_engine_driver_cbconnect', json_decode($data, true));
//
//        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
 