<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/9/14
 * Time: 12:44
 */

namespace CricketBrasil\Exception;


class GenericCallbackMessageException extends ProcessCallbackException
{
    protected $message;

    public function __construct($message = null)
    {
        if (!is_null($this->message)) {
            $message = $this->message;
        }

        $f = function() use ($message) {

            $messageTemplate = array(
                'error' => true,
                'message' => $message
            );

            return json_encode($messageTemplate);
        };

        parent::__construct($f, $message);
    }
}