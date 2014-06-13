<?php
namespace RestHandler\DTO\Search;

use Clickbus\RestHandler\DTO\Search\Search;
use Clickbus\RestHandler\DTO\Search\Parts;

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
        $this->assertInstanceOf('Clickbus\RestHandler\DTO\Search\Parts', $this->search->parts[0]);
        $this->assertInternalType('array', $this->search->parts);
    }
}
