<?php
require 'vendor/autoload.php';

use InkMaster\Foundation\PersistentManager;

$pm = PersistentManager::getInstance();

echo "=== STILI DAL DATABASE ===\n";
foreach ($pm->findAvailableStyles() as $stile) {
    echo $stile->getId() . ' - ' . $stile->getNome() . "\n";
}

echo "\n=== DASHBOARD MODERATORE ===\n";
$mod = new \InkMaster\Control\ControllerAmministratore\ModerazionePiattaforma();
print_r($mod->visualizzaDashboard()['data']['kpi']);

echo "\n=== SEGNALAZIONI (quante) ===\n";
echo count($mod->accedi_segnalazioni()['data']) . " segnalazioni\n";