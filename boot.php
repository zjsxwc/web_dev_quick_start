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
    'twig.path' => __DIR__.'/views',
));


$app->get('/product/{name}', function ($name) use ($app) {
    /** @var \Doctrine\ORM\EntityManager $em */
    $em = $app['entity_manager'];
    $product = new BizModel\Product();
    $product->setName($name);

    $em->persist($product);
    $em->flush();

    return 'Saved ' . $product->getId();
});


$app->get('/list', function () use ($app) {
    /** @var \Doctrine\ORM\EntityManager $em */
    $em = $app['entity_manager'];

    $productRepository = $em->getRepository('BizModel\Product');
    /** @var BizModel\Product[] $products */
    $products = $productRepository->findAll();
    $data = [
        'products'=>[]
    ];
    foreach ($products as $product) {
        $data['products'][] = $product->getName();
    }

    /** @var \Twig_Environment $twigEnv */
    $twigEnv = $app['twig'];
    return $twigEnv->render('list.twig',array(
        'data' => json_encode($data)
    ));

});

$app->run();