<?php
require_once __DIR__ . '/../vendor/autoload.php';
$em = require_once __DIR__ . '/../config/bootstrap-doctrine.php';

use InkMaster\Entity\Studio;
use InkMaster\Entity\Tatuatore;
use InkMaster\Entity\Cliente;
use InkMaster\Entity\Appuntamento;

$studi    = $em->getRepository(Studio::class)->findAll();
$clienti  = $em->getRepository(Cliente::class)->findAll();

if (empty($studi) || empty($clienti)) {
    echo "Nessuno studio o cliente trovato. Esegui prima seed.php.\n";
    exit;
}

$costiPub = [80, 120, 150, 200, 250, 300, 400, 500];
$noteApp  = [
    'Vuole una manica giapponese, stilizzata.',
    'Cover-up di un vecchio tatuaggio sul braccio destro.',
    'Prima sessione, cliente nuovo. Ha già il disegno approvato.',
    'Ritocco sessione precedente.',
    'Consulenza + prima sessione manica.',
];

echo "Creo 12 appuntamenti beta...\n";
$creati = 0;

for ($i = 0; $i < 12; $i++) {
    $studio  = $studi[array_rand($studi)];
    $tatuatori = array_values(array_filter(
        $em->getRepository(Tatuatore::class)->findBy(['studio' => $studio]),
        fn($t) => $t !== null
    ));

    if (empty($tatuatori)) continue;

    $tat     = $tatuatori[array_rand($tatuatori)];
    $cliente = $clienti[$i % count($clienti)];
    $giorni  = rand(-30, 60);
    $dataApp = new DateTime(($giorni >= 0 ? '+' : '') . $giorni . ' days');
    $ora     = rand(9, 17);
    $oraIni  = new DateTime(sprintf('%02d:00', $ora));
    $oraFine = new DateTime(sprintf('%02d:00', $ora + rand(1, 3)));
    $stato   = $giorni < 0 ? 'completato' : (rand(0,1) ? 'confermato' : 'in attesa');

    $app = new Appuntamento(
        $dataApp, $oraIni, $oraFine, $stato,
        $cliente, $studio, $tat,
        $noteApp[array_rand($noteApp)],
        $stato === 'completato' ? (float)$costiPub[array_rand($costiPub)] : null
    );
    $em->persist($app);
    $creati++;
}

$em->flush();
echo "✓ $creati appuntamenti creati.\n";
