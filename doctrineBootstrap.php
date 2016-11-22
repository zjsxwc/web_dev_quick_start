<?php
/**
 * Created by IntelliJ IDEA.
 * User: wangchao
 * Date: 10/19/16
 * Time: 2:17 PM
 */

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once  __DIR__."/vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/dbSchema"), $isDevMode,null,null,false);
// or if you prefer yaml or XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

// database configuration parameters
$conn = include __DIR__ . "/dbConfig.php";

// obtaining the entity manager
return $entityManager = EntityManager::create($conn, $config);