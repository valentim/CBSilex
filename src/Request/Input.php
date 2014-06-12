<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/8/14
 * Time: 11:42
 */

namespace Clickbus\Request;


interface Input
{
    public function setBody(array $contentBody);
    public function setQueryString(array $contentQueryString);
} 