<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/12/14
 * Time: 15:17
 */

namespace Request;


use Clickbus\DataTransfer\Request\Seat\BlockRequest;
use Clickbus\DataTransfer\Request\Seat\BuyerRequest;
use Clickbus\DataTransfer\Request\Seat\OrderItemRequest;
use Clickbus\DataTransfer\Request\Seat\PassengerRequest;
use Clickbus\DataTransfer\Request\Seat\ReservationRequest;
use Clickbus\DataTransfer\Request\Seat\ScheduleRequest;
use Clickbus\DataTransfer\Request\Trip\TripRequest;
use Clickbus\DataTransfer\Request\Trip\WaypointRequest;
use Clickbus\Request\DataBinding;

class DataBindingTest extends \PHPUnit_Framework_TestCase
{

    public function testBindDataTripRequest()
    {
        $input = '{
                "from": "Terminal do Tiete",
                "to": "Rio de Janeiro - Galeão",
                "departure": "2010-10-10",
                "quantity": 2,
                "return": "2010-11-10",
                "waypoints": [
                  {
                    "to": "Ribeirão Preto",
                    "date": "2010-10-12",
                    "quantity": 2
                  },
                  {
                    "to": "Goiânia",
                    "date": "2010-10-14",
                    "quantity": 2
                  }
                ],
                "locale": "pt_BR",
                "flexibleDates": true
              }';


        $outputSubObject1 = new WaypointRequest;
        $outputSubObject1->setTo('Ribeirão Preto')
            ->setQuantity('2')
            ->setDate('2010-10-12');

        $outputSubObject2 = new WaypointRequest;
        $outputSubObject2->setTo('Goiânia')
            ->setQuantity('2')
            ->setDate('2010-10-14');


        $outputObject = new TripRequest;
        $outputObject->setFrom('Terminal do Tiete')
            ->setDeparture('2010-10-10')
            ->setFlexibleDates(true)
            ->setLocale('pt_BR')
            ->setQuantity('2')
            ->setReturn('2010-11-10')
            ->setTo('Rio de Janeiro - Galeão')
            ->setWaypoints($outputSubObject1)
            ->setWaypoints($outputSubObject2);

        $this->object->bindData(json_decode($input, true));

        $this->assertEquals($outputObject->getFrom(), $this->object->getObject()->getFrom());
        $this->assertEquals($outputObject->getTo(), $this->object->getObject()->getTo());
        $this->assertEquals($outputObject->getDeparture(), $this->object->getObject()->getDeparture());
        $this->assertEquals($outputObject->getFlexibleDates(), $this->object->getObject()->getFlexibleDates());
        $this->assertEquals($outputObject->getLocale(), $this->object->getObject()->getLocale());
        $this->assertEquals($outputObject->getReturn(), $this->object->getObject()->getReturn());

        $outputObject->getWaypoints()->rewind();
        $this->object->getObject()->getWaypoints()->rewind();
        while ($outputObject->getWaypoints()->valid() && $this->object->getObject()->getWaypoints()->valid()) {

            $this->assertEquals($outputObject->getWaypoints()->current()->getTo(), $this->object->getObject()->getWaypoints()->current()->getTo());
            $this->assertEquals($outputObject->getWaypoints()->current()->getDate(), $this->object->getObject()->getWaypoints()->current()->getDate());
            $this->assertEquals($outputObject->getWaypoints()->current()->getQuantity(), $this->object->getObject()->getWaypoints()->current()->getQuantity());

            $this->object->getObject()->getWaypoints()->next();
            $outputObject->getWaypoints()->next();
        }
    }

    public function testBindDataWaypointRequest()
    {
        $this->object = new DataBinding(new WaypointRequest);
        $input = '{
                    "to": "Ribeirão Preto",
                    "date": "2010-10-12",
                    "quantity": 2
                  }';

        $outputSubObject1 = new WaypointRequest;
        $outputSubObject1->setTo('Ribeirão Preto')
            ->setQuantity('2')
            ->setDate('2010-10-12');

        $this->object->bindData(json_decode($input, true));

        $this->assertEquals($outputSubObject1, $this->object->getObject());

    }

    public function testBindDataScheduleRequest()
    {
        $this->object = new DataBinding(new ScheduleRequest);
        $input = '{
                "id": "e5b193ca-f11e-4108-887c-9656edf91611",
                "date": "2014-06-23",
                "time": "07:00",
                "timezone": "Pakistan Time Zone (UTC +5)"
              }';

        $outputScheduleData = new ScheduleRequest;
        $outputScheduleData->setDate('2014-06-23')
            ->setId('e5b193ca-f11e-4108-887c-9656edf91611')
            ->setTime('07:00')
            ->setTimezone('Pakistan Time Zone (UTC +5)');

        $this->object->bindData(json_decode($input, true));
        $this->assertEquals($outputScheduleData, $this->object->getObject());

    }

    public function testBindDataBlockRequest()
    {
        $this->object = new DataBinding(new BlockRequest);
        $input = '{
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
           }';

        $outputScheduleData = new ScheduleRequest;
        $outputScheduleData->setDate('2014-06-23')
            ->setId('e5b193ca-f11e-4108-887c-9656edf91611')
            ->setTime('07:00')
            ->setTimezone('Pakistan Time Zone (UTC +5)');

        $outputBlockData = new BlockRequest;
        $outputBlockData->setFrom('2a6578da-9db4-48d5-9191-1f9524c9d043')
            ->setTo('cd7bc748-131d-4900-b04a-019f7e1234b2')
            ->setSeat("")
            ->setSessionId('DDFF999-AAACCC-DDDFFF@113-AFAFDD')
            ->setSchedule($outputScheduleData);

        $this->object->bindData(json_decode($input, true));

        $this->assertEquals($outputScheduleData->getDate(), $this->object->getObject()->getSchedule()->getDate());
        $this->assertEquals($outputScheduleData->getId(), $this->object->getObject()->getSchedule()->getId());
        $this->assertEquals($outputScheduleData->getTimezone(), $this->object->getObject()->getSchedule()->getTimezone());
        $this->assertEquals($outputScheduleData->getTime(), $this->object->getObject()->getSchedule()->getTime());
        $this->assertEquals($outputBlockData->getFrom(), $this->object->getObject()->getFrom());
        $this->assertEquals($outputBlockData->getSeat(), $this->object->getObject()->getSeat());
        $this->assertEquals($outputBlockData->getTo(), $this->object->getObject()->getTo());
        $this->assertEquals($outputBlockData->getSessionId(), $this->object->getObject()->getSessionId());

    }

    public function testBindDataReservationRequest()
    {
        $this->object = new DataBinding(new ReservationRequest);

        $input = '{
                "sessionId": "DDFF999-AAACCC-DDDFFF@113-AFAFDD",
                "buyer": {
                  "firstName": "Klederson",
                  "lastName": "Bueno",
                  "email": "dev@clickbus.com.br",
                  "document": "123.123.123-11",
                  "gender": "M",
                  "birthday": "1986-05-17",
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
             }';

        $outputDataBuyer = new BuyerRequest;
        $outputDataBuyer->setBirthday('1986-05-17')
            ->setDocument('123.123.123-11')
            ->setEmail('dev@clickbus.com.br')
            ->setFirstName('Klederson')
            ->setGender('M')
            ->setLastName('Bueno')
            ->setMeta([]);

        $outputDataPassenger = new PassengerRequest;
        $outputDataPassenger->setMeta("")
            ->setFirstName('Klederson')
            ->setLastName('Bueno')
            ->setGender("M")
            ->setDocument('123.123.123-01')
            ->setBirthday('1986-05-17')
            ->setMeta([])
            ->setEmail('dev@clickbus.com.br');

        $outputOrderItemData = new OrderItemRequest;
        $outputOrderItemData->setPassenger($outputDataPassenger)
            ->setProducts([])
            ->setSeatReservation('DDFF999-AAACCC-DDDFFF@113-AFAFDD');

        $outputReservationData = new ReservationRequest;
        $outputReservationData->setSessionId('DDFF999-AAACCC-DDDFFF@113-AFAFDD')
            ->setBuyer($outputDataBuyer)
            ->setOrderItems($outputOrderItemData);

        $this->object->bindData(json_decode($input, true));

        $this->assertEquals($outputReservationData->getSessionId(), $this->object->getObject()->getSessionId());
        $this->assertEquals($outputReservationData->getBuyer()->getFirstName(), $this->object->getObject()->getBuyer()->getFirstName());
        $this->assertEquals($outputReservationData->getBuyer()->getLastName(), $this->object->getObject()->getBuyer()->getLastName());
        $this->assertEquals($outputReservationData->getBuyer()->getEmail(), $this->object->getObject()->getBuyer()->getEmail());
        $this->assertEquals($outputReservationData->getBuyer()->getDocument(), $this->object->getObject()->getBuyer()->getDocument());
        $this->assertEquals($outputReservationData->getBuyer()->getGender(), $this->object->getObject()->getBuyer()->getGender());
        $this->assertEquals($outputReservationData->getBuyer()->getBirthday(), $this->object->getObject()->getBuyer()->getBirthday());
        $this->assertEquals($outputReservationData->getBuyer()->getMeta(), $this->object->getObject()->getBuyer()->getMeta());

        $outputReservationData->getOrderItems()->rewind();
        $this->object->getObject()->getOrderItems()->rewind();

        while($outputReservationData->getOrderItems()->valid() && $this->object->getObject()->getOrderItems()->valid()) {
            $this->assertEquals($outputReservationData->getOrderItems()->current()->getSeatReservation(), $this->object->getObject()->getOrderItems()->current()->getSeatReservation());
            $this->assertEquals($outputReservationData->getOrderItems()->current()->getProducts(), $this->object->getObject()->getOrderItems()->current()->getProducts());
            $this->assertEquals($outputReservationData->getOrderItems()->current()->getPassenger()->getBirthday(), $this->object->getObject()->getOrderItems()->current()->getPassenger()->getBirthday());
            $this->assertEquals($outputReservationData->getOrderItems()->current()->getPassenger()->getDocument(), $this->object->getObject()->getOrderItems()->current()->getPassenger()->getDocument());
            $this->assertEquals($outputReservationData->getOrderItems()->current()->getPassenger()->getEmail(), $this->object->getObject()->getOrderItems()->current()->getPassenger()->getEmail());
            $this->assertEquals($outputReservationData->getOrderItems()->current()->getPassenger()->getFirstName(), $this->object->getObject()->getOrderItems()->current()->getPassenger()->getFirstName());
            $this->assertEquals($outputReservationData->getOrderItems()->current()->getPassenger()->getGender(), $this->object->getObject()->getOrderItems()->current()->getPassenger()->getGender());
            $this->assertEquals($outputReservationData->getOrderItems()->current()->getPassenger()->getLastName(), $this->object->getObject()->getOrderItems()->current()->getPassenger()->getLastName());
            $this->assertEquals($outputReservationData->getOrderItems()->current()->getPassenger()->getMeta(), $this->object->getObject()->getOrderItems()->current()->getPassenger()->getMeta());

            $outputReservationData->getOrderItems()->next();
            $this->object->getObject()->getOrderItems()->next();
        }
    }

    public function testBindDataBuyerRequest()
    {

    }

    public function testBindDataPassengerRequest()
    {

    }

    protected function setUp()
    {
        $this->object = new DataBinding(new TripRequest);
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
 