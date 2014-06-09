<?php
namespace RestHandler;

use Clickbus\RestHandler\ResponseManager;
use Clickbus\RestHandler\ResponseEntity;

class ResponseManagerTest extends \PHPUnit_Framework_TestCase
{
    protected $responseManager;

    protected function setUp()
    {
        $this->responseManager = new ResponseManager();
    }

    public function testReponseHandlerObjectExists()
    {
        $this->assertInstanceOf("Clickbus\\RestHandler\\ResponseManager", $this->responseManager);
    }

    public function testGetResponse()
    {
        $entity = $this->getMock('TestEntity', array('getContent'));

        $entityContent = array('id' => 1);
        $entity->expects($this->any())
            ->method('getContent')
            ->will($this->returnValue($entityContent));

        $this->responseManager->setContent($entity->getContent());

        $content = json_encode(array('meta' => null, 'content' => $entityContent));
        $this->assertEquals($content, $this->responseManager->getResponse());
    }
}