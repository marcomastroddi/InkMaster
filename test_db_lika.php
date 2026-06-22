<?php
require 'vendor/autoload.php';

use InkMaster\Foundation\PersistentManager;

$pm = PersistentManager::getInstance();

<<<<<<< HEAD
echo "=== STILI DAL DATABASE ===\n";
foreach ($pm->findAvailableStyles() as $stile) {
    echo $stile->getId() . ' - ' . $stile->getNome() . "\n";
=======
echo "=== Tatuatori dato lo studio con id 1 ===\n";
foreach ($pm->findTatuatoriByStudioId(1) as $tatuatori) {
    echo $tatuatori->getId() . ' - ' . $tatuatori->getNome() . "\n";
}

echo "=== Stili dato lo studio con id 1 ===\n";
foreach ($pm->findStiliByStudioId(1) as $stili) {
    echo $stili->getId() . ' - ' . $stili->getNome() . "\n";
>>>>>>> 6bad9842cb586b1837ea2874f4a5a1a82cc5dc2f
}
