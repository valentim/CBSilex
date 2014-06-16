<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/8/14
 * Time: 11:42
 */

namespace Clickbus\Request;


use Clickbus\RestHandler\DataTransfer\TransferInterface;

interface InputInterface
{
    public function setBody(array $contentBody);
    public function setQueryString(array $contentQueryString);
    public function setTransferType(TransferInterface $transferData);
} 