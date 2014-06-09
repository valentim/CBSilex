<?php
namespace Clicbus\RestHandler;

interface ResponseEntity
{
    public function bind();

    public function getContent();
}
