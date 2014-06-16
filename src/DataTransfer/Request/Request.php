<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/15/14
 * Time: 13:30
 */

namespace Clickbus\DataTransfer\Request;


use Clickbus\DataTransfer\AbstractTransferBehavior;
use Clickbus\DataTransfer\TransferInterface;

class Request extends AbstractTransferBehavior
{
    protected $meta;
    protected $request;

    /**
     * @param mixed $request
     */
    public function setRequest(TransferInterface $request)
    {
        $this->request = $request;
    }

    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param mixed $meta
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;
    }

    /**
     * @return mixed
     */
    public function getMeta()
    {
        return $this->meta;
    }
}