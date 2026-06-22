<?php
require 'vendor/autoload.php';

use InkMaster\Foundation\PersistentManager;

$pm = PersistentManager::getInstance();

echo "\n=== SEGNALAZIONI DAL DATABASE ===\n";
foreach ($pm->findAllSegnalazioni() as $segnalazione) {
    echo $segnalazione->getId() . ' - ' . $segnalazione->getDescrizione() . "\n";
}