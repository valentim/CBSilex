<?php
namespace Clickbus\RestHandler;

use Clickbus\RestHandler\ResponseEntity;

class ResponseManager
{
    /**
     * @var array
     */
    protected $responseTemplate = array(
        'meta' => null,
        'content' => null
    );

    /**
     * @var array
     */
    protected $content;

    /**
     * Set the response content
     * 
     * @param array $content
     */
    public function setContent($content)
    {
        $this->responseTemplate['content'] = $content;
    }

    /**
     * Get response json encoded
     * 
     * @return string
     */
    public function getResponse()
    {
        return json_encode($this->responseTemplate);
    }
}
