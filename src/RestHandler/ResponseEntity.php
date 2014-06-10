<?php
namespace Clickbus\RestHandler;

use Clicbus\RestHandler\ResponseEntityBinder;

interface ResponseEntity extends ResponseEntityBinder
{
    /**
     * Bind entity response
     */
    public function bind();

    /**
     * Get content
     * 
     * @return array
     */
    public function getContent();

    /**
     * Register all templates that composite the entity
     */
    protected function registerTemplates();
}
