<?php

use Clickbus\BusServiceLayer\Exception\ProcessCallbackException;

$app->error(function (\Exception $e, $code) {

    if ($e instanceof ProcessCallbackException) {
        /** @var ProcessCallbackException $callbackException */
        return call_user_func($e->getCallback());
    }

    return $e->getMessage();
});