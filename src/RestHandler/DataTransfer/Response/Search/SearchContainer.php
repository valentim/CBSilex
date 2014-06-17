<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/16/14
 * Time: 18:44
 */

namespace Clickbus\RestHandler\DataTransfer\Response\Search;


use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;

class SearchContainer extends AbstractTransferBehavior
{
    protected $meta;
    protected $items;

    public function __construct()
    {
        $this->items = new \SplObjectStorage;
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

    /**
     * @param mixed $items
     */
    public function setItems(Search $search)
    {
        $this->items->attach($search);
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }
} 