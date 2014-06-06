<?php
namespace Clickbus\Controller;

use Symfony\Component\HttpFoundation\Request;

use Silex\Application;

class SeatblockController
{
    public function sessionAction(Application $app, $sessionId)
    {
        return $app->json(array(), 200);
    }

    public function blockAction(Application $app)
    {
        return $app->json(array(), 200);
    }
}
