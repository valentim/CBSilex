<?php
namespace Clickbus\Controller;

use Symfony\Component\HttpFoundation\Response;
use Silex\Application;

class IndexController
{
    public function indexAction(Application $app, $name)
    {
        return new Response('Hello ' . $name);
    }
}
