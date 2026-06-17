<?php
// doctrine.php  (nella cartella radice del progetto)

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

require_once 'vendor/autoload.php';

$entityManager = require_once 'config/bootstrap-doctrine.php';

ConsoleRunner::run(new SingleManagerProvider($entityManager));