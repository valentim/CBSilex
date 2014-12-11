<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/9/14
 * Time: 12:12
 */

namespace CricketBrasil\Exception;


class ProcessCallbackException extends \Exception
{
    protected $callback;

    public function __construct(\Closure $callback, $message = "", \Exception $previous = null)
    {
        parent::__construct($message, 0, $previous);
        $this->callback = $callback;
    }

    public function getCallback()
    {
        return $this->callback;
    }
}