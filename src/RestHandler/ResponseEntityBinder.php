<?php
namespace Clickbus\RestHandler;

use Clickbus\RestHandler\ResponseTemplateException;

abstract class ResponseEntityBinder
{
    /**
     * @var array
     */
    protected $templates = array();

    /**
     * @var array
     */
    protected $content;

    /**
     * Get content
     * 
     * @return array
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Bind entity response
     */
    public function bind()
    {
        if (count($this->templates) == 0) {
            throw new ResponseTemplateException('Templates not seted');
        }

        $content = array();

        foreach ($this->templates as $template) {
            $this->content = array_merge_recursive($this->content, $template);
        }
    }
}