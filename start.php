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



$callAction = function () use ($app) {
    $args = func_get_args();
    $action = array_shift($args);
    $leftArgs = $args;
    list($methodName,$controllerName) = explode('@',$action);
    $controller = new $controllerName($app);
    return call_user_func_array(array($controller, $methodName), $leftArgs);
};


//start routing
$app->get('/product/{name}', function ($name) use ($app,$callAction) {
    return $callAction('create@Top\Controller\Product',$name);
});

$app->get('/list', function () use ($app,$callAction) {
    return $callAction('listAll@Top\Controller\Product');
});



$app->run();