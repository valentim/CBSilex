<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/10/14
 * Time: 1:34
 */

namespace Clickbus\HandlerData;

interface OutputInterface
{
    public function getResult();
    public function setOutput($output);
    public function getFactory($type);
} 