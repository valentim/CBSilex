<?php
/**
 * Created by PhpStorm.
 * User: tiagobutzke
 * Date: 6/18/14
 * Time: 3:13 PM
 */

use Clickbus\BusServiceLayer\BookingEngineService\Driver\RapidoOchoa;

class RapidOchoaTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    public function testRapidOchoaObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\BusServiceLayer\\BookingEngineService\\Driver\\RapidoOchoa", $this->object);
    }

    protected function setUp()
    {
        $config = array(
            'departure_url' => 'http://190.85.56.76/wsTarifasROpruebas/ServicioTarifas.asmx',
            'departure_wsdl' => 'http://190.85.56.76/wsTarifasROpruebas/ServicioTarifas.asmx?wsdl',
            'arrival_url' => 'http://190.145.82.98/SATServicesclickbus/Service/WSVentaOnline.svc',
            'arrival_wsdl' => 'http://190.145.82.98/SATServicesclickbus/Service/WSVentaOnline.svc/basic?wsdl',
            'user' => 'MVM',
            'password' => 'Mvm2007mvm!',
            'locale' => 'es_CO',
            'place_country' => 'COL',
            'bus_company_name' => 'RapidoOchoa'
        );

        $this->object = new RapidoOchoa($config);
    }

    protected function tearDown()
    {
        $this->object = null;
    }
}
