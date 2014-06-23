<?php
/**
 * Created by PhpStorm.
 * User: tiagobutzke
 * Date: 6/20/14
 * Time: 4:29 PM
 */

namespace Clickbus\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class PaymentController extends AbstractController
{
    public function postAction(Application $app, Request $request)
    {
        return $app->json([], 200);
    }
}
