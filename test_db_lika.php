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

echo "=== Cliente dato lo username matteo.gallo ===\n";
$cliente = $pm->findClienteByUsername("matteo.gallo");

if ($cliente !== null) {
    echo $cliente->getId() . ' - ' . $cliente->getNome() . " " . $cliente->getCognome() . "\n";
} else {
    echo "Cliente non trovato!\n";
}

echo "=== Amministratore dato lo username admin ===\n";
$amministratore = $pm->findAmministratoreByUsername("admin");

if ($amministratore !== null) {
    echo $amministratore->getId() . ' - ' . $amministratore->getNome() . " " . $amministratore->getCognome() . "\n";
} else {
    echo "Amministratore non trovato!\n";
}

echo "=== Studio dato lo username vesuvio_ink ===\n";
$studio = $pm->findStudioByUsername("vesuvio_ink");

if ($studio !== null) {
    echo $studio->getId() . ' - ' . $studio->getNome() . "\n";
} else {
    echo "Studio non trovato!\n";
}