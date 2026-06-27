<?php
// config/bootstrap-doctrine.php

// Importiamo le classi necessarie direttamente dal core di Doctrine
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\Proxy\ProxyFactory;

// Includiamo l'autoloader di Composer
require_once __DIR__ . '/../vendor/autoload.php';

// Creiamo la configurazione base di Doctrine indicando dove trovare le Entity
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/../src/Entity'],
    isDevMode: false,
);

// Su hosting condiviso /tmp non è scrivibile: genera i proxy in memoria
$config->setAutoGenerateProxyClasses(ProxyFactory::AUTOGENERATE_EVAL);

$connectionParams = [
    'dbname'   => 'if0_42279462_db_inkmaster',
    'user'     => 'if0_42279462',
    'password' => 'AMeo3hPLj7q',
    'host'     => 'sql302.infinityfree.com',
    'driver'   => 'pdo_mysql',
];

// Creiamo la connessione tramite il DriverManager di Doctrine
$connection = DriverManager::getConnection($connectionParams, $config);

// Istanziamo e restituiamo l'EntityManager
$entityManager = new EntityManager($connection, $config);

return $entityManager;