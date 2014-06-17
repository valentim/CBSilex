<?php
namespace RestHandler\DataTransfer\Response\Search;


use Clickbus\RestHandler\DataTransfer\Response\Search\Parts;
use Clickbus\RestHandler\DataTransfer\Response\Search\Search;

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
        $this->search->setParts($parts);

        $this->assertInternalType('string', $this->search->from);
        $this->assertInternalType('string', $this->search->to);
        $this->search->parts->rewind();
        $this->assertInstanceOf('Clickbus\RestHandler\DataTransfer\Response\Search\Parts', $this->search->parts->current());
        $this->assertInstanceOf('SplObjectStorage', $this->search->parts);
    }
}
