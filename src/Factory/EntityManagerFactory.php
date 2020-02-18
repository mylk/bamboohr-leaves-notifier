<?php

namespace BambooHrLeavesNotifier\Factory;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\EnvPlaceholderParameterBag;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

class EntityManagerFactory
{
    public static function create(EnvPlaceholderParameterBag $parameterBag, $modelDirectory = 'Entity', $isDevMode = true)
    {
        $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/../".$modelDirectory), $isDevMode);

        $paths  = array(__DIR__ . '/../Entity');
        $driver = new AnnotationDriver(new AnnotationReader(), $paths);
        // registering noop annotation autoloader - allow all annotations by default
        AnnotationRegistry::registerLoader('class_exists');
        $config->setMetadataDriverImpl($driver);

        // database configuration parameters
        $conn = array(
            "driver" => $parameterBag->get('db_driver'),
            "path" => __DIR__ . "/" . $parameterBag->get('db_path'),
        );

        // obtaining the entity manager
        $entityManager = EntityManager::create($conn, $config);

        return $entityManager;
    }
}
