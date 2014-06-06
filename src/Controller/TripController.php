<?php
namespace Clickbus\Controller;

use Symfony\Component\HttpFoundation\Request;

use Silex\Application;

class TripController
{
    public function portfolioAction(Application $app, $from, $to, $date)
    {
        return $app->json(array(), 200);
    }
}
