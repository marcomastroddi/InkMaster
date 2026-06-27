<?php
// scripts/assign_images.php
// Assigns real tattoo photos to ALL publications based on style match (cycles if more pubs than photos).
// Run from project root: php scripts/assign_images.php

require_once __DIR__ . '/../vendor/autoload.php';

$em = require __DIR__ . '/../config/bootstrap-doctrine.php';

use InkMaster\Entity\PubblicazioneTatuaggio;

$styleImages = [
    'Trash Polka'    => array_map(fn($i) => "/img/fototatuaggi/trash_polka_0{$i}.jpg", range(1, 5)),
    'Japanese'       => array_map(fn($i) => "/img/fototatuaggi/japanese_" . str_pad($i, 2, '0', STR_PAD_LEFT) . ".jpg", range(1, 12)),
    'Realistico'     => array_map(fn($i) => "/img/fototatuaggi/realistico_0{$i}.jpg", range(1, 6)),
    'Tribal'         => array_map(fn($i) => "/img/fototatuaggi/tribal_0{$i}.jpg", range(1, 7)),
    'Minimal'        => array_map(fn($i) => "/img/fototatuaggi/minimal_0{$i}.jpg", range(1, 8)),
    'Neo Traditional'=> array_map(fn($i) => "/img/fototatuaggi/neo_trad_0{$i}.jpg", range(1, 5)),
    'Geometrico'     => ['/img/fototatuaggi/geometrico_01.jpg'],
    'Blackwork'      => array_map(fn($i) => "/img/fototatuaggi/blackwork_0{$i}.jpg", range(1, 3)),
    'Watercolor'     => ['/img/fototatuaggi/watercolor_01.jpg'],
    'Old School'     => array_map(fn($i) => "/img/fototatuaggi/old_school_0{$i}.jpg", range(1, 2)),
    'Tradizionale'   => array_map(fn($i) => "/img/fototatuaggi/tradizionale_0{$i}.jpg", range(1, 4)),
    'Dotwork'        => array_map(fn($i) => "/img/fototatuaggi/dotwork_0{$i}.jpg", range(1, 5)),
];

$counters = array_fill_keys(array_keys($styleImages), 0);

echo "Carico pubblicazioni...\n";
$pubblicazioni = $em->getRepository(PubblicazioneTatuaggio::class)->findAll();
echo "  → " . count($pubblicazioni) . " pubblicazioni trovate.\n";

$updated = 0;
$skipped = 0;

foreach ($pubblicazioni as $pub) {
    $matched = null;
    foreach ($pub->getStili() as $stile) {
        if (isset($styleImages[$stile->getNome()])) {
            $matched = $stile->getNome();
            break;
        }
    }

    if ($matched === null) {
        $skipped++;
        continue;
    }

    $images = $styleImages[$matched];
    $img    = $images[$counters[$matched] % count($images)];
    $pub->setPercorsoImmagine($img);
    $counters[$matched]++;
    $updated++;

    if ($updated % 100 === 0) {
        $em->flush();
        echo "  → {$updated} aggiornate...\n";
    }
}

$em->flush();
echo "\nFatto! Aggiornate: {$updated}  Saltate (stile senza foto): {$skipped}\n";
echo "Distribuzione per stile:\n";
foreach ($counters as $nome => $cnt) {
    if ($cnt > 0) echo "  {$nome}: {$cnt}\n";
}
