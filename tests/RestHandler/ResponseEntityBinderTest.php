<?php
namespace RestHandler;

class ResponseEntityBinderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException Clickbus\RestHandler\ResponseTemplateException
     */
    public function testBindException()
    {
        $responseEntityBinder = $this->getMockForAbstractClass('Clickbus\RestHandler\ResponseEntityBinder');

        $responseEntityBinder->bind();
    }
}
