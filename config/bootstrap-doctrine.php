<?php
// config/bootstrap-doctrine.php

// Importiamo le classi necessarie direttamente dal core di Doctrine
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

// Includiamo l'autoloader di Composer
require_once __DIR__ . '/../vendor/autoload.php';

// Creiamo la configurazione base di Doctrine indicando dove trovare le Entity
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/../src/Entity'],
    isDevMode: false,
);

$connectionParams = [
    'dbname'   => 'inkmaster_db',
    'user'     => 'root',
    'password' => '',
    'host'     => '127.0.0.1',
    'driver'   => 'pdo_mysql',
];

// Creiamo la connessione tramite il DriverManager di Doctrine
$connection = DriverManager::getConnection($connectionParams, $config);

// Istanziamo e restituiamo l'EntityManager
$entityManager = new EntityManager($connection, $config);

return $entityManager;