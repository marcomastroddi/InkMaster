<?php
// 1. Autoloader di Composer
require_once __DIR__ . '/../vendor/autoload.php';

// 2. Inclusioni dei file reali dell'app
require_once __DIR__ . '/../src/Presentation/SmartyBoot.php';
require_once __DIR__ . '/../src/Control/RicercaVisualizzaTatuatori.php'; // Cambia con il tuo nome file

$controller = new \App\Control\RicercaVisualizzaTatuatori();

// Avvii il tuo metodo specifico
$controller->RicercaVisualizzaTatuatori();


