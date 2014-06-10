<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/10/14
 * Time: 1:34
 */

namespace Clickbus\Response;


interface Output
{
    public function getResult();
    public function setOutput(array $output);
    public function getTemplate($type);
} 