<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/16/14
 * Time: 18:44
 */

namespace Clickbus\RestHandler\DataTransfer\Response\SeatBlock;


use Clickbus\RestHandler\DataTransfer\AbstractTransferBehavior;
use Clickbus\RestHandler\DtoInterface;

class SeatBlockContainer extends AbstractTransferBehavior implements DtoInterface
{
    protected $meta;
    protected $content;

    public function __construct()
    {
        $this->content = new \SplObjectStorage;
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
    public function setContent(SeatBlock $seatBlock)
    {
        $this->content->attach($seatBlock);
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }
} 