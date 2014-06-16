<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/12/14
 * Time: 14:05
 */

namespace Clickbus\DataTransfer;


use SplObjectStorage;

abstract class AbstractTransferBehavior implements TransferInterface, \JsonSerializable
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

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    public function jsonSerialize()
    {
        $properties = get_object_vars($this);

        $data = [];
        foreach ($properties as $property => $value) {
            if ($value instanceof SplObjectStorage) {
                $value = $this->getCollection($value);
            }
            $data[$property] = $value;
        }

        return $data;
    }

    protected function getCollection($values)
    {
        $collection = [];

        foreach ($values as $value) {
            array_push($collection, $value);
        }

        return $collection;
    }
}