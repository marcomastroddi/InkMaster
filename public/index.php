<?php










































































/*
=========================================================================
CODICE DISATTIVATO (SPOSTATO IN FONDO ALLA PAGINA)
=========================================================================


 * =========================================================================
 * FRONT CONTROLLER - HOME PAGE
 * =========================================================================
 * Questo script funge da punto di ingresso per la visualizzazione della Home Page.
 * Coordina il recupero dei dati dal livello di controllo (Business Logic) e il
 * successivo passaggio al motore di templating (Presentation Layer).
 

// 1. ENVIRONMENT SETUP & INIZIALIZZAZIONE
// -------------------------------------------------------------------------

// Inclusione dell'Autoloader di Composer per la gestione automatica delle dipendenze e delle classi
require_once __DIR__ . '/../vendor/autoload.php';

// Inclusione del file di bootstrap: inizializza e restituisce l'EntityManager di Doctrine (ORM)
$entityManager = require_once __DIR__ . '/../config/bootstrap-doctrine.php';

// Importazione esplicita dei namespace delle classi utilizzate nel file
use InkMaster\Control\RicercaVisualizzaTatuatori;
use App\Presentation\SmartyBoot;


// =========================================================================
// APPLICATION LOGIC LAYER: COORDINAMENTO CON IL CONTROLLORE
// =========================================================================


 * Istanziazione del Controllore specifico per la ricerca e visualizzazione dei tatuatori.
 * Viene iniettato l'EntityManager per consentire l'accesso al database tramite ORM.
 
$controller = new RicercaVisualizzaTatuatori($entityManager);


 * Esecuzione della Business Logic: il metodo mostra_home() elabora e restituisce 
 * un array associativo contenente tutti i dati necessari alla Home Page 
 * (es. stili, recensioni, tatuatori in evidenza).
 
$datiHome = $controller->mostra_home();


// =========================================================================
// PRESENTATION LAYER: BINDING DATI E RENDERING (SMARTY VIEW)
// =========================================================================

// Recupero dell'istanza singleton/configurata del motore di templating Smarty
$smarty = SmartyBoot::getSmarty();


 * Assegnazione delle variabili dinamiche al motore Smarty.
 * I dati estratti dal controller vengono mappati in variabili accessibili all'interno del template.

$smarty->assign('stili', $datiHome['stili']);                 // Elenco degli stili di tatuaggio disponibili
$smarty->assign('citta_corrente', $datiHome['citta_corrente']); // Eventuale città selezionata o rilevata per la geolocalizzazione
$smarty->assign('recensione', $datiHome['recensione']);         // Recensioni da mostrare in evidenza
$smarty->assign('tatuatori', $datiHome['tatuatori']);           // Lista dei tatuatori da renderizzare nella griglia/lista


Rendering finale: compila il template Smarty specificato iniettando 
le variabili assegnate e invia l'HTML risultante al browser dell'utente.

$smarty->display('pages/home.tpl');

*/