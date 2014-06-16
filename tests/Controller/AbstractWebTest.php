<?php
/**
 * Created by PhpStorm.
 * User: thiagovalentim
 * Date: 6/16/14
 * Time: 0:41
 */

namespace Controller;


use Silex\WebTestCase;

abstract class AbstractWebTest extends WebTestCase
{
    /**
     * Creates the application.
     *
     * @return HttpKernel
     */
    public function createApplication()
    {
        return require __DIR__ . '/../../web/test.php';
    }
} 