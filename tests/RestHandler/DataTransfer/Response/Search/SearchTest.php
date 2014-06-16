<?php
namespace RestHandler\DataTransfer\Response\Search;

use Clickbus\RestHandler\DataTransfer\Response\Search\Search;
use Clickbus\RestHandler\DataTransfer\Response\Search\Parts;

class SearchTest extends \PHPUnit_Framework_TestCase
{
    protected $search;

    protected function setUp()
    {
        $this->search = new Search();
    }

    public function testIntegrity()
    {
        $parts = new Parts();

        $this->search->setFrom('São Paulo, SP');
        $this->search->setTo('Rio de Janeiro, RJ');
        $this->search->addParts($parts);

        $this->assertInternalType('string', $this->search->from);
        $this->assertInternalType('string', $this->search->to);
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Search\Parts', $this->search->parts[0]);
        $this->assertInternalType('array', $this->search->parts);
    }
}
