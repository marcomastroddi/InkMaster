<?php
require 'vendor/autoload.php';

use InkMaster\Foundation\PersistentManager;

$pm = PersistentManager::getInstance();

echo "=== STILI DAL DATABASE ===\n";
foreach ($pm->findAvailableStyles() as $stile) {
    echo $stile->getId() . ' - ' . $stile->getNome() . "\n";
}


