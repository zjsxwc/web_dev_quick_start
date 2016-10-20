<?php
/**
 * Created by IntelliJ IDEA.
 * User: wangchao
 * Date: 10/20/16
 * Time: 10:54 AM
 */

namespace Top\Controller;

use Top\BizModel\Products;

class Product extends Base
{
    public function create($name){
        $product = new Products();
        $product->setName($name);

        $this->em->persist($product);
        $this->em->flush();

        return 'Saved ' . $product->getId();
    }

    public function listAll()
    {
        $productRepository = $this->em->getRepository('Top\BizModel\Products');
        /** @var Products[] $products */
        $products = $productRepository->findAll();
        $data = [
            'products'=>[]
        ];
        foreach ($products as $product) {
            $data['products'][] = $product->getName();
        }

        /** @var \Twig_Environment $twigEnv */
        $twigEnv = $this->app['twig'];
        return $twigEnv->render('list.twig',array(
            'data' => json_encode($data)
        ));

    }

}