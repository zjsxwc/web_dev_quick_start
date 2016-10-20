<?php
/**
 * Created by IntelliJ IDEA.
 * User: wangchao
 * Date: 10/20/16
 * Time: 3:42 PM
 */

namespace Top;

use Silex\Application;

class Router
{
    static public function prepare(Application $app)
    {
        /** @var Callable $callAction */
        $callAction = $app['call_action'];
        //start routing
        $app->get('/product/{name}', function ($name) use ($app,$callAction) {
            return $callAction('create@Top\Controller\Product',$name);
        });

        $app->get('/list', function () use ($app,$callAction) {
            return $callAction('listAll@Top\Controller\Product');
        });

    }
}