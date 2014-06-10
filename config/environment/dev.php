<?php
use Symfony\Component\Debug\ErrorHandler;

ini_set('display_errors', 'On');
error_reporting(E_ALL);

$app['debug'] = true;

ErrorHandler::register();