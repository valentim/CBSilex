<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/9/14
 * Time: 12:44
 */

namespace Clickbus\Exception;


class GenericCallbackMessageException extends ProcessCallbackException
{
    public function __construct($message = null)
    {
        $f = function() use ($message) {

            $messageTemplate = [
                'error' => true,
                'message' => $message
            ];

            return json_encode($messageTemplate);
        };

        parent::__construct($f, $message);
    }
}