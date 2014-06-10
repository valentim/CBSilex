<?php
namespace Clickbus\Provider;

use \Silex\Application;
use \Silex\ServiceProviderInterface;
use \Symfony\Component\HttpFoundation\Request;

class CountryServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $uriParameters = explode('/', $_SERVER['REQUEST_URI']);

        if (!isset($uriParameters[1])) {
            throw new \InvalidArgumentException('Country is a must');
        }

        $app['country'] = $uriParameters[1];

        return;
    }

    public function boot(Application $app) {}
}
