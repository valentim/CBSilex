<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/12/14
 * Time: 14:05
 */

namespace Clickbus\RestHandler\DataTransfer;


abstract class AbstractTransferBehavior implements TransferInterface
{
    public function getData()
    {
        return new \ReflectionClass(get_class($this));
    }

    public function getNamespace()
    {
        $namespace = explode("\\", get_class($this));
        array_pop($namespace);

        return implode("\\", $namespace);
    }
}