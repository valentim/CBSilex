<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/16/14
 * Time: 0:14
 */

namespace Clickbus\Controller;


use Silex\Application;

class IndexController
{
    public function indexAction(Application $app)
    {
        return $app->json([], 200);
    }
} 