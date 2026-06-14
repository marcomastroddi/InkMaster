<?php
// src/foundation/bootstrap.php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

// Includiamo l'autoloader di Composer (che ora si trova due livelli sopra)
require_once __DIR__ . '/../../vendor/autoload.php';

// Specifichiamo a Doctrine dove si trovano le nostre classi Entity
$paths = [__DIR__ . '/../entity'];
$isDevMode = true; // True per vedere gli errori nel dettaglio durante lo sviluppo

$config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);

// Parametri di connessione al database locale di Laragon
$connectionParams = [
    'driver'   => 'pdo_mysql',
    'host'     => '127.0.0.1',
    'dbname'   => 'inkmaster_db',   // Il nome del database che creerete su Laragon
    'user'     => 'root',           // Di default su Laragon è root
    'password' => '',               // Di default su Laragon è vuota
    'charset'  => 'utf8mb4',
];

// Creazione della connessione e dell'EntityManager
$connection = DriverManager::getConnection($connectionParams, $config);
$entityManager = new EntityManager($connection, $config);

// Restituiamo l'entityManager così da poterlo usare negli altri layer (es. in Control)
return $entityManager;