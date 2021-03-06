<?php
use Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Symfony\Component\HttpFoundation\Request;

use DerAlex\Silex\YamlConfigServiceProvider;

/**
 * Registering Yaml service provider
 */
$app->register(new YamlConfigServiceProvider(__DIR__ . '/parameters.yml'));


// Register Doctrine ORM
$app->register(new DoctrineServiceProvider, array(
    "db.options"    => array(
        "driver"    => "pdo_mysql",
        "dbname"    => "database",
        "host"      => "localhost",
        "user"      => "root",
        "password"  => "root"
    ),
));

$app->register(new DoctrineOrmServiceProvider, array(
    "orm.em.options" => array(
        "mappings" => array(
            array(
                "type" => "annotation",
                "namespace" => "CricketBrasil\Entity",
                "path" => __DIR__."/../src/Entity",
            )
        ),
    ),
));

$app->before(function (Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }
});
