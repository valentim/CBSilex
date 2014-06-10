<?php
namespace Clicbus\RestHandler;

use Clicbus\RestHandler\ResponseEntityBinder;

interface ResponseEntity extends ResponseEntityBinder
{
    public function bind();

    public function getContent();

    protected function registerTemplates();
}
