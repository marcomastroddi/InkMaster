<?php
require_once __DIR__ . '/../vendor/autoload.php';
$em = require_once __DIR__ . '/../config/bootstrap-doctrine.php';

$conn = $em->getConnection();

echo "Svuoto le tabelle...\n";
$conn->executeStatement('SET FOREIGN_KEY_CHECKS=0');

foreach ([
    'appuntamenti', 'recensioni', 'pubblicazioni_stili',
    'pubblicazioni', 'tatuatori_stili', 'tatuatori',
    'studi', 'clienti', 'stili'
] as $tabella) {
    $conn->executeStatement("TRUNCATE TABLE `$tabella`");
    echo "  Svuotata: $tabella\n";
}

$conn->executeStatement('SET FOREIGN_KEY_CHECKS=1');
echo "Done.\n";
