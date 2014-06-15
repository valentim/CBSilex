<?php
namespace RestHandler\DTO\Search;

use Clickbus\RestHandler\DTO\Search\AbstractSearchFactory;

class AbstractSearchFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testSearchBuild()
    {
        // $pricesWaypoint = 123;
        // $pricesPrice = 9000;

        // $scheduleId = 12;
        // $scheduleDate = '2015-10-31';
        // $scheduleTime = '11:00';
        // $scheduleTimezone = 'America/Sao_Paulo';

        // $stationCurrentId = 111;
        // $stationCurrentName = 'Autobus Terminal of Barra Funda';
        // $stationCurrentLocale = 'en_US';

        // $stationDefaultId = 1231;
        // $stationDefaultName = 'Terminal Rodoviário da Barra Funda';
        // $stationDefaultLocale = 'pt_BR';

        // $station = new Station();
        // $station->setCurrent($stationCurrent);
        // $station->setDefault($stationDefault);

        // $placeCountry = 'BRA';
        // $placeState = 'São Paulo';
        // $placeCity = 'São Paulo';
        // $placeStation = $station;
        // $placeLocale = 'en_US';
        // $placeId = 123;

        // $waypointId = 113;
        // $waypoint->addPrices($prices);
        // $waypointSchedule = $schedule;
        // $waypointContext = 'departure';
        // $waypointPlace = $place;
        // $waypointIsDeparture = true;
        // $waypointPosition = 0;

        // $departurePrice = 9000;
        // $departureWaypoint = $waypoint;

        // $arrivalScheduleId = 13;
        // $arrivalScheduleDate = '2015-10-31';
        // $arrivalScheduleTime = '19:00';
        // $arrivalScheduleTimezone = 'America/Sao_Paulo';

        // $arrivalCurrentStationId = 112;
        // $arrivalCurrentStationName = 'Galeao Terminal';
        // $arrivalCurrentStationLocale = 'en_US';

        // $arrivalDefaultStationId = 1232;
        // $arrivalDefaultStationName = 'Terminal do Galeão';
        // $arrivalDefaultStationLocale = 'pt_BR';

        // $arrivalStation = new Station();
        // $arrivalStation->setCurrent($arrivalCurrentStation);
        // $arrivalStation->setDefault($arrivalDefaultStation);

        // $arrivalPlaceCountry = 'BRA';
        // $arrivalPlaceState = 'São Paulo';
        // $arrivalPlaceCity = 'Santos';
        // $arrivalPlaceStation = $arrivalStation;
        // $arrivalPlaceLocale = 'en_US';
        // $arrivalPlaceId = 124;

        // $arrivalWaypointId = 123;
        // $arrivalWaypointSchedule = $arrivalSchedule;
        // $arrivalWaypointContext = 'arrival';
        // $arrivalWaypointPlace = $arrivalPlace;
        // $arrivalWaypointIsDeparture = true;
        // $arrivalWaypointPosition = 2;

        // $arrivalPrice = 0;
        // $arrivalWaypoint = $arrivalWaypoint;

        // $busCompanyName = 'Itapemirim';
        // $busCompanyId = 12;

        // $busServiceClass = 'Conventional';
        // $busName = 'BusName';
        // $busId = 1;

        // $partWaypointSchedule = new Schedule();
        // $partWaypointSchedule->setId(12);
        // $partWaypointSchedule->setDate('2015-10-31');
        // $partWaypointSchedule->setTime('11:00');
        // $partWaypointSchedule->setTimezone('America/Sao_Paulo');

        // $partWaypointPrices = new Prices();
        // $partWaypointPrices->setWaypoint(123);
        // $partWaypointPrices->setPrice(9000);

        // $partWaypointStationCurrent = new StationCurrent();
        // $partWaypointStationCurrent->setId(111);
        // $partWaypointStationCurrent->setName('Autobus Terminal of Barra Funda');
        // $partWaypointStationCurrent->setLocale('en_US');

        // $partWaypointStationDefault = new StationDefault();
        // $partWaypointStationDefault->setId(1231);
        // $partWaypointStationDefault->setName('Terminal Rodoviário da Barra Funda');
        // $partWaypointStationDefault->setLocale('pt_BR');

        // $partWaypointStation = new Station();
        // $partWaypointStation->setCurrent($partWaypointStationCurrent);
        // $partWaypointStation->setDefault($partWaypointStationDefault);

        // $partWaypointPlace = new Place();
        // $partWaypointPlace->setCountry('BRA');
        // $partWaypointPlace->setState('São Paulo');
        // $partWaypointPlace->setCity('São Paulo');
        // $partWaypointPlace->setStation($partWaypointStation);
        // $partWaypointPlace->setLocale('en_US');
        // $partWaypointPlace->setId(123);

        // $partWaypoint = new Waypoint();
        // $partWaypoint->setId(113);
        // $partWaypoint->addPrices($partWaypointPrices);
        // $partWaypoint->setSchedule($partWaypointSchedule);
        // $partWaypoint->setContext('departure');
        // $partWaypoint->setPlace($partWaypointPlace);
        // $partWaypoint->setIsDeparture(true);
        // $partWaypoint->setPosition(0);

        // $seatType = new SeatType();
        // $seatType->setName('Professor');
        // $seatType->setDiscount(0.9);
        // $seatType->setId(1);

        // $product = new Product();
        // $product->setUuid('ab123d123d1');
        // $product->setName('Potato Chips');
        // $product->setPrice(500);
        // $product->setCurrency('BRL');
        // $product->setAvaliable(true);

        // $parts = new Parts();
        // $parts->setTripId(333);
        // $parts->setDeparture($departure);
        // $parts->setArrival($arrival);
        // $parts->setBuscompany($busCompany);
        // $parts->setBus($bus);
        // $parts->addWaypoint($partWaypoint);
        // $parts->addSeatType($seatType);
        // $parts->addProduct($product);
        // $parts->setAvailableSeats(10);

        // $search = new Search();
        // $search->setFrom('São Paulo, SP');
        // $search->setTo('Rio de Janeiro, RJ');
        // $search->addParts($parts);

        // $search = AbstractSearchFactory::buld();

        // $this->assertInstanceOf('Clickbus\RestHandler\DTO\Search\Search', $search);
    }
}