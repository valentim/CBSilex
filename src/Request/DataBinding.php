<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/12/14
 * Time: 13:58
 */

namespace Clickbus\Request;


use Clickbus\DataTransfer\TransferInterface;

class DataBinding
{

    public function __construct(TransferInterface $object)
    {
        $this->object = $object;
    }

    public function bindData(array $data, TransferInterface $object = null)
    {
        if (is_null($object)) {
            $object = $this->object;
        }

        foreach ($object->getData()->getMethods() as $methodData) {
            $method = $methodData->name;
            $attribute = lcfirst(str_replace("set", "", $method, $count));

            if (!isset($data[$attribute]) || $count == 0) {
                continue;
            }

            $value = $data[$attribute];
            $this->setData($object, $methodData, $value);
        }
    }

    public function getObject()
    {
        return $this->object;
    }

    protected function setData($object, $methodData, $value)
    {
        if (is_array($value)) {
            $this->setSubData($object, $methodData, $value);
        } else {
            $this->setter($object, $methodData->name, $value);
        }
    }

    protected function setSubData($object, $methodData, $value)
    {
        if ($this->checkStructure($value)) {
            $value = [$value];
        }

        foreach ($value as $eachData) {
            $method = $methodData->name;
            $namespace = $object->getNamespace();
            $className = current($methodData->getParameters())->name.'Request';
            $class =  $namespace.'\\'.ucfirst($className);

            $newValue = $eachData;
            if (class_exists($class)) {
                $newValue = new $class;
                $this->bindData($eachData, $newValue);

            }

            $this->setter($object, $method, $newValue);
        }
    }

    protected function setter($object, $method, $value)
    {
        $object->$method($value);
    }

    protected function checkStructure($value)
    {
        return array_keys($value) !== range(0, count($value) - 1);
    }
} 