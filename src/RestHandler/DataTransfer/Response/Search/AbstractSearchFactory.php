<?php
namespace Clickbus\RestHandler\DataTransfer\Response\Search;

<<<<<<< HEAD
use Clickbus\RestHandler\DataTransfer\Response\Search\Prices;
use Clickbus\RestHandler\DataTransfer\Response\Search\Product;
use Clickbus\RestHandler\DataTransfer\Response\Search\SeatType;
use Clickbus\RestHandler\DataTransfer\Response\Search\Waypoint;
use Clickbus\RestHandler\DataTransfer\Response\Search\Part;
use Clickbus\RestHandler\DataTransfer\Response\Search\Schedule;
use Clickbus\RestHandler\DataTransfer\Response\Search\StationCurrent;
use Clickbus\RestHandler\DataTransfer\Response\Search\StationDefault;
use Clickbus\RestHandler\DataTransfer\Response\Search\Station;
use Clickbus\RestHandler\DataTransfer\Response\Search\Place;
use Clickbus\RestHandler\DataTransfer\Response\Search\Departure;
use Clickbus\RestHandler\DataTransfer\Response\Search\Arrival;
use Clickbus\RestHandler\DataTransfer\Response\Search\BusCompany;
use Clickbus\RestHandler\DataTransfer\Response\Search\Bus;
use Clickbus\RestHandler\DataTransfer\Response\Search\Search;


abstract class AbstractSearchFactory
{
=======
use Clickbus\HandlerData\DataBinding;

abstract class AbstractSearchFactory
{
    public static function bindData($data)
    {
        $transform = new DataBinding(new SearchContainer);
        $transform->bindData($data);

        return $transform->getObject();
    }

>>>>>>> added response objects
    public static function build($from, $to, array $parts)
    {
        $search = new Search();
        $search->setFrom($from);
        $search->setTo($to);

        if (count($parts) > 0) {
            foreach ($parts as $part) {
<<<<<<< HEAD
                $search->addParts($part);
=======
                $search->setParts($part);
>>>>>>> added response objects
            }
        }

        return $search;
    }

    public static function buildPart(
        $tripId,
        $departurePrice,
        $departureWaypoint,
        $arrivalPrice,
        $arrivalWaypoint,
        $busCompanyId,
        $busCompanyName,
        $busId,
        $busName,
        $busServiceClass,
        array $waypoints,
        array $seatTypes,
        array $products,
        $availableSeats
    ) {
        $departure = new Departure();
        $departure->setPrice($departurePrice);
        $departure->setWaypoint($departureWaypoint);

        $arrival = new Arrival();
        $arrival->setPrice($arrivalPrice);
        $arrival->setWaypoint($arrivalWaypoint);

        $busCompany = new BusCompany();
        $busCompany->setId($busCompanyId);
        $busCompany->setName($busCompanyName);

        $bus = new Bus();
        $bus->setId($busId);
        $bus->setName($busName);
        $bus->setServiceClass($busServiceClass);

        $part = new Parts();
        $part->setTripId($tripId);
        $part->setDeparture($departure);
        $part->setArrival($arrival);
        $part->setBuscompany($busCompany);
        $part->setBus($bus);

        if (count($waypoints) > 0) {
            foreach ($waypoints as $waypoint) {
<<<<<<< HEAD
                $part->addWaypoint($waypoint);
=======
                $part->setWaypoints($waypoint);
>>>>>>> added response objects
            }
        }

        if (count($seatTypes) > 0) {
            foreach ($seatTypes as $seatType) {
<<<<<<< HEAD
                $part->addSeatType($seatType);
=======
                $part->setSeatTypes($seatType);
>>>>>>> added response objects
            }
        }

        if (count($products) > 0) {
            foreach ($products as $product) {
<<<<<<< HEAD
                $part->addProduct($product);
=======
                $part->setProducts($product);
>>>>>>> added response objects
            }
        }

        $part->setAvailableSeats($availableSeats);

        return $part;
    }

    public static function buildWaypoint(
        $id,
        $context,
        $isDeparture,
        $position,
        $scheduleId,
        $scheduleDate,
        $scheduleTime,
        $scheduleTimezone,
        $placeId,
        $placeLocale,
        $placeCountry,
        $placeState,
        $placeCity,
        $stationCurrentId,
        $stationCurrentName,
        $stationCurrentLocale,
        $stationDefaultId,
        $stationDefaultName,
        $stationDefaultLocale,
        array $prices = array()
    ) {
        $schedule = new Schedule();
        $schedule->setId($scheduleId);
        $schedule->setDate($scheduleDate);
        $schedule->setTime($scheduleTime);
        $schedule->setTimezone($scheduleTimezone);

        $stationCurrent = new StationCurrent();
        $stationCurrent->setId($stationCurrentId);
        $stationCurrent->setName($stationCurrentName);
        $stationCurrent->setLocale($stationCurrentLocale);

        $stationDefault = new StationDefault();
        $stationDefault->setId($stationDefaultId);
        $stationDefault->setName($stationDefaultName);
        $stationDefault->setLocale($stationDefaultLocale);

        $station = new Station();
        $station->setCurrent($stationCurrent);
        $station->setDefault($stationDefault);

        $place = new Place();
        $place->setId($placeId);
        $place->setCountry($placeCountry);
        $place->setState($placeState);
        $place->setCity($placeCity);
        $place->setStation($station);
        $place->setLocale($placeLocale);

        $waypoint = new Waypoint();
        $waypoint->setId($id);
        $waypoint->setSchedule($schedule);
        $waypoint->setContext($context);
        $waypoint->setPlace($place);
        $waypoint->setIsDeparture($isDeparture);
        $waypoint->setPosition($position);

        if (count($prices) > 0) {
            foreach ($prices as $price) {
<<<<<<< HEAD
                $waypoint->addPrices($price);
=======
                $waypoint->setPrices($price);
>>>>>>> added response objects
            }
        }

        return $waypoint;
    }

    public static function buildSeatType($id, $name, $discount)
    {
        $seatType = new SeatType();
        $seatType->setId($id);
        $seatType->setName($name);
        $seatType->setDiscount($discount);

        return $seatType;
    }

    public static function buildProduct($uuid, $name, $price, $currency, $avaliable)
    {
        $product = new Product();
        $product->setUuid($uuid);
        $product->setName($name);
        $product->setPrice($price);
        $product->setCurrency($currency);
        $product->setAvaliable($avaliable);

        return $product;
    }

    public static function buildPrice($waypoint, $price)
    {
<<<<<<< HEAD
        $prices = new Prices();
=======
        $prices = new Price();
>>>>>>> added response objects
        $prices->setWaypoint($waypoint);
        $prices->setPrice($price);

        return $prices;
    }
}
