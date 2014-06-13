<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/8/14
 * Time: 11:42
 */

namespace Clickbus\Request;


interface InputInterface
{
    public function setBody(array $contentBody);
    public function setQueryString(array $contentQueryString);
    public function setMethod($method);
    public function getMethod();
} 