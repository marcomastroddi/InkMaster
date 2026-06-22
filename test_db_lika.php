<?php
require 'vendor/autoload.php';

use InkMaster\Foundation\PersistentManager;

$pm = PersistentManager::getInstance();

echo "=== Tatuatori dato lo studio con id 1 ===\n";
foreach ($pm->findTatuatoriByStudioId(1) as $tatuatori) {
    echo $tatuatori->getId() . ' - ' . $tatuatori->getNome() . "\n";
}

echo "=== Stili dato lo studio con id 1 ===\n";
foreach ($pm->findStiliByStudioId(1) as $stili) {
    echo $stili->getId() . ' - ' . $stili->getNome() . "\n";
}
