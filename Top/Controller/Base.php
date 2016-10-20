<?php
/**
 * Created by IntelliJ IDEA.
 * User: wangchao
 * Date: 10/20/16
 * Time: 10:56 AM
 */

namespace Top\Controller;


/**
 * Class Base
 * @package Top\Controller
 * @property \Doctrine\ORM\EntityManager $em
 * @property \Twig_Environment $twigEnv
 */
class Base
{


    public $app = null;
    public $em = null;
    public $twigEnv = null;

    /**
     * Base constructor.
     */
    public function __construct($app)
    {
        $this->app = $app;
        $this->em = $app['entity_manager'];
        $this->twigEnv = $this->app['twig'];
    }
}