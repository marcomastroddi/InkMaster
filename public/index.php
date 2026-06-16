<?php

// 1. Inclusione dell'Autoloader di Composer
require_once __DIR__ . '/../vendor/autoload.php';

// 2. Inclusione e cattura dell'EntityManager di Doctrine
// Poiché bootstrap.php fa il "return" della variabile, la catturiamo direttamente così:
$entityManager = require_once __DIR__ . '/../src/Foundation/bootstrap.php';

// Importazione dei namespace corretti secondo la struttura delle cartelle
use InkMaster\Control\RicercaVisualizzaTatuatori;
use App\Presentation\SmartyBoot;

// =========================================================================
// PRESENTATION LAYER: COORDINAMENTO CON IL CONTROL
// =========================================================================

// Istanziamo la classe Control passandogli l'EntityManager ottenuto dal bootstrap
$controller = new RicercaVisualizzaTatuatori($entityManager);

// Chiamiamo il metodo per preparare i dati iniziali della Home Page
$datiHome = $controller->mostra_home();


// =========================================================================
// PRESENTATION LAYER: TRAVASO DATI IN SMARTY E RENDERING
// =========================================================================

// Recuperiamo l'istanza del motore grafico Smarty
$smarty = SmartyBoot::getSmarty();

// Passiamo a Smarty i dati reali pronti per essere usati nel file .tpl
$smarty->assign('stili', $datiHome['stili']);
$smarty->assign('citta_corrente', $datiHome['citta_corrente']);
$smarty->assign('recensione', $datiHome['recensione']);
$smarty->assign('tatuatori', $datiHome['tatuatori']); 

// Mostriamo la pagina home.tpl (il percorso parte da src/templates/ grazie a SmartyBoot)
$smarty->display('pages/home.tpl');


