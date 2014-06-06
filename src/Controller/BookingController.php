<?php
namespace Clickbus\Controller;

use Symfony\Component\HttpFoundation\Request;

use Silex\Application;

class BookingController
{
    public function putAction(Application $app)
    {
        return $app->json(array(), 200);
    }

    public function getAction(Application $app, $guide)
    {
        return $app->json(array(), 200);
    }

    public function deleteAction(Application $app, $guide)
    {
        return $app->json(array(), 200);
    }
}
