<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/9/14
 * Time: 12:39
 */

namespace Clickbus\BusServiceLayer\BookingEngineService\Service;

use Clickbus\Exception\GenericCallbackMessageException;

class NotExistsServiceException extends GenericCallbackMessageException
{
    protected $message = 'This service not exists';
}