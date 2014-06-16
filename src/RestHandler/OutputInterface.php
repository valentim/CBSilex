<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/10/14
 * Time: 1:34
 */

namespace Clickbus\RestHandler;

use Clickbus\RestHandler\DtoInterface;

interface OutputInterface
{
    public function getResult();
    public function setOutput(DtoInterface $output);
    public function getFactory($type);
} 