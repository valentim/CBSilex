<?php
namespace Clicbus\RestHandler;

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
        $content = array();

        foreach ($this->templates as $template) {
            $this->content = array_merge_recursive($this->content, $template);
        }
    }
}