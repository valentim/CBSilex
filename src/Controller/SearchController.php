<?php
namespace Clickbus\Controller;

use Symfony\Component\HttpFoundation\Request;

use Silex\Application;

class SearchController
{
    public function getAction(Application $app)
    {
        return $app->json(array(), 200);
    }
}
