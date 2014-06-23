<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/5/14
 * Time: 21:08
 */

namespace Clickbus\BusServiceLayer\BookingEngineService\Driver;


use Clickbus\BusServiceLayer\BookingEngineService\AbstractDriverTemplate;
use Clickbus\RestHandler\DataTransfer\Request\Booking\BookingRequest;
use Clickbus\RestHandler\DataTransfer\Request\Seat\SeatBlockRequest;
use Clickbus\RestHandler\DataTransfer\Request\Trip\PortfolioRequest;
use Clickbus\RestHandler\DataTransfer\Request\Search\SearchRequest;
use Clickbus\RestHandler\DataTransfer\Response\Booking\AbstractBookingFactory;
use Clickbus\RestHandler\DataTransfer\Response\BookingDto;
use GuzzleHttp\Client;
use GuzzleHttp\Query;

class CbConnect extends AbstractDriverTemplate
{
    protected $client;
    protected $method;
    protected $config;

    public function __construct(array $config)
    {
        parent::__construct();
        $this->client = new Client(['base_url' => $config['host']]);
    }

    protected function callBooking(BookingRequest $bookingTransfer, $factory)
    {
        $this->method = 'put';
        $data = $this->call('/booking', ['body' => json_encode($bookingTransfer)]);

        $id = 123;
        $status = 'pending';
        $localizer = 'ABDDDD999';
        $uuid = '53347e09aee47';
        $payment = false;
        $createdAt = '2010-10-30';
        $card = 'XXXX-XXXX-XXXX-1234';
        $code = 'XXX';
        $name = 'Klederson Bueno Bezerra da Silva';
        $expiration = 'XXXX-XX-XX';
        $paymentMethod = 'Credit Card';
        $paymentTotal = 3900;
        $paymentCurrency = 'BRL';
        $paymentStatus = 'pending';
        $typeName = 'Professor';
        $typeDicount = 0.9;
        $quantity = 1;
        $price = 23;
        $currency = 'BR';
        $typeId = 1;

        $products = AbstractBookingFactory::buildProduct($uuid, $name, $quantity, $price, $currency);
        $items = AbstractBookingFactory::buildItem(
            123123123,
            1234,
            12,
            '2014-10-31',
            '10:00',
            'America/Sao_Paulo',
            113,
            15,
            '2014-10-31',
            '23:00',
            'America/Sao_Paulo',
            123,
            'Professor',
            0.9,
            1,
            14,
            'A01',
            1000,
            'pending',
            'BRL',
            'Klederson',
            'Bueno',
            'dev@clickbus.com.br',
            '123.123.123-01',
            'M',
            '1986-05-17',
            array(),
            array(
                $products
            ),
            1900
        );

        $booking = AbstractBookingFactory::buildBooking(
            $id,
            $status,
            $localizer,
            $uuid,
            $payment,
            $createdAt,
            $card,
            $code,
            $name,
            $expiration,
            $paymentMethod,
            $paymentTotal,
            $paymentCurrency,
            $paymentStatus,
            $typeName,
            $typeDicount,
            $typeId,
            [$items]
        );

        return new BookingDto($booking);
    }

    protected function callSeatBlock(SeatBlockRequest $seatBlockTransfer, $factory)
    {
        $this->method = 'post';
        $data = $this->call('/seat/block', ['body' => json_encode($seatBlockTransfer)]);

        return $factory::bindData($data);
    }

    protected function callSeats(PortfolioRequest $portfolioTransfer, $factory)
    {
        $this->method = 'get';

        $queryData = new Query();
        $queryData->add('from', $portfolioTransfer->getFrom())
            ->add('to', $portfolioTransfer->getTo())
            ->add('date', $portfolioTransfer->getDate());

        $data = $this->call('/trip/portfolio', ['query' => $queryData]);



        return $factory::bindData($data);
    }

    protected function callSearch(SearchRequest $searchTransfer, $factory)
    {
        $this->method = 'post';
        $data = $this->call('/search', ['body' => json_encode($searchTransfer)]);

        return $factory::bindData($data);
    }

    private function call($action, $data)
    {
        $response = $this->client->{$this->method}($action, $data);

        return $response->json();
    }
}