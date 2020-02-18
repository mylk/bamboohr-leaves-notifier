<?php

namespace BambooHrLeavesNotifier;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use BambooHrLeavesNotifier\Factory\EntityManagerFactory;

require_once "vendor/autoload.php";

$containerBuilder = new ContainerBuilder();
$loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__));
$loader->load("./config/services.yaml");
$loader->load("./config/parameters.yaml");

// register doctrine orm
$entityManager = new Definition(EntityManager::class);
$entityManager->setFactory(array(EntityManagerFactory::class, "create"))->setArguments(
	[$containerBuilder->getParameterBag()]
);
$containerBuilder->setDefinition("entity_manager", $entityManager);
