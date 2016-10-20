<?php
/**
 * Created by IntelliJ IDEA.
 * User: wangchao
 * Date: 10/19/16
 * Time: 2:13 PM
 */

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

$autoLoader = require_once __DIR__ . '/vendor/autoload.php';

$app = new Silex\Application();

$app['entity_manager'] = require_once __DIR__ . "/doctrineBootstrap.php";
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/Top/views',
));



//start routing
$app->get('/product/{name}', function ($name) use ($app) {
    $controller = new Top\Controller\Product($app);
    return $controller->create($name);
});

$app->get('/list', function () use ($app) {
    $controller = new Top\Controller\Product($app);
    return $controller->listAll();
});



$app->run();