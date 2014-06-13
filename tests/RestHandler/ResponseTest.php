<?php
namespace RestHandler;

use Clickbus\RestHandler\Response;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    protected $dto;

    protected function setUp()
    {
        $this->dto = $this->getMock('Clickbus\RestHandler\Dto');
        $this->dto->content = array();
    }

    public function testNullResponse()
    {
        $content = json_encode(array('meta' => null, 'content' => array()));
        $this->assertEquals($content, json_encode(new Response($this->dto)));        
    }

    public function testGetResponse()
    {
        $this->dto->content = array('test' => 'test');

        $content = json_encode(array('meta' => null, 'content' => array('test' => 'test')));
        $this->assertEquals($content, json_encode(new Response($this->dto)));
    }

    public function tearDown()
    {
        $this->dto = null;
    }
}