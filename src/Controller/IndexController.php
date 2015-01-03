<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/16/14
 * Time: 0:14
 */

namespace CricketBrasil\Controller;

use Silex\Application;

class IndexController
{
    public function indexAction(Application $app)
    {
        $foo = $app['orm.em'];

        return $app->json(array('Hello' => 'World'), 200);
    }
} 