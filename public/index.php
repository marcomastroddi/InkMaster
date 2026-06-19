<?php
require_once __DIR__ . '/../vendor/autoload.php';

use InkMaster\Control\RicercaVisualizzaTatuatori;
use InkMaster\Control\PrenotazionePagamento;


use InkMaster\Control\ModerazionePiattaforma;
use InkMaster\Foundation\SessionManager;


SessionManager::start();

$controller = new RicercaVisualizzaTatuatori();
$controller2 = new PrenotazionePagamento();
$controller5 = new ModerazionePiattaforma();


//INTERFACCIA 1 - RICERCA E VISUALIZZAZIONE TATUATORI
$datiHome = $controller->mostra_home();
echo '<h2>mostra_home</h2>';
echo '<pre>';
print_r($datiHome);
echo '</pre>';

$datiCitta = $controller->scegli_citta();
echo '<h2>scegli_città</h2>';
echo '<pre>';
print_r($datiCitta);
echo '</pre>';

$datiPosizione = $controller->seleziona_posizione('Roma');
echo '<h2>seleziona_posizione</h2>';
echo '<pre>';
print_r($datiPosizione);
echo '</pre>';

$datiStili = $controller->apri_stili_disponibili();
echo '<h2>apri_stili_disponibili</h2>';
echo '<pre>';
print_r($datiStili);
echo '</pre>';

$datiStile = $controller->seleziona_stile('Realistico');
echo '<h2>seleziona_stile</h2>';
echo '<pre>';
print_r($datiStile);
echo '</pre>';

$datiTesto = $controller->inserisci_testo_ricerca('Mario Rossi');
echo '<h2>inserisci_testo_ricerca</h2>';
echo '<pre>';
print_r($datiTesto);
echo '</pre>';

$datiRicerca = $controller->avvia_ricerca();
echo '<h2>avvia_ricerca</h2>';
echo '<pre>';
print_r($datiRicerca);
echo '</pre>';

//INTERFACCIA 2 - PRENOTAZIONE E PAGAMENTO
$datistudio = $controller2->scegli_studio(1);
echo '<h2>scegli_studio</h2>';
echo '<pre>';
print_r($datistudio);
echo '</pre>';

/*$datiappuntamento = $controller2->richiedi_appuntamento(1); da aggiungere nel caso duso 2
echo '<h2>richiedi_appuntamento</h2>';
echo '<pre>';
print_r($datiappuntamento);
echo '</pre>';
*/




//INTERFACCIA 3 - GESTIONE PROFILO UTENTE
// da implementare scrivete qua sotto



//INTERFACCIA 4 - GESTIONE RECENSIONI
// da implementare scrivete qua sotto



//INTERFACCIA 5 - MODERAZIONE PIATTAFORMA
$datiSegnalazioni = $controller5->accedi_segnalazioni();
echo '<h2>accedi_segnalazioni</h2>';
echo '<pre>';
print_r($datiSegnalazioni);
echo '</pre>';

$datiUtente = $controller5->seleziona_utente(1);
echo '<h2>seleziona_utente</h2>';
echo '<pre>';
print_r($datiUtente);
echo '</pre>';

$datiBan = $controller5->conferma_ban('temporaneo', '7 giorni', 'spam', 'bassa', 'Utente ha inviato messaggi ripetuti');
echo '<h2>conferma_ban</h2>';
echo '<pre>';
print_r($datiBan);
echo '</pre>';




























/*<?php
require_once __DIR__ . '/../vendor/autoload.php';

use InkMaster\Control\RicercaVisualizzaTatuatori;
use InkMaster\Presentation\View;

$page = $_GET['page'] ?? 'home';

$controller = new RicercaVisualizzaTatuatori();
$controller2 = new PrenotazionePagamento();


switch ($page) {

//INTERFACCIA 1 - RICERCA E VISUALIZZAZIONE TATUATORI(completa)
    case 'home':
        $dati = $controller->mostra_home();
        View::render('home', $dati);
        break;

    case 'cerca':
        $dati = $controller->scegli_citta();
        View::render('cerca', $dati);
        break;

    case 'seleziona_posizione':
    $citta = $_GET['citta'] ?? '';
    $dati = $controller->seleziona_posizione($citta);
    header('Content-Type: application/json');
    echo json_encode($dati);
    break;

    case 'stili':
    $dati = $controller->apri_stili_disponibili();
    View::render('stili', $dati);
    break;

    case 'seleziona_stile':
    $stile = $_GET['stile'] ?? '';
    $dati = $controller->seleziona_stile($stile);
    header('Content-Type: application/json');
    echo json_encode($dati);
    break;

    case 'inserisci_testo_ricerca':
    $testo = $_POST['testo'] ?? '';
    $dati = $controller->inserisci_testo_ricerca($testo);
    header('Content-Type: application/json');
    echo json_encode($dati);
    break;

    case 'avvia_ricerca':
    $dati = $controller->avvia_ricerca();
    View::render('risultati', $dati);
    break;


//INTERFACCIA 2 - PRENOTAZIONE E PAGAMENTO(in corso)
    case 'scegli_studio':
        $id = (int)($_GET['id'] ?? 0);
        $dati = $controller2->scegli_studio($id);
        View::render('studio', $dati);
        break;
    
 
        
//INTERFACCIA 3 - GESTIONE PROFILO UTENTE
// da implementare scrivete qua sotto



//INTERFACCIA 4 - GESTIONE RECENSIONI
// da implementare scrivete qua sotto



//INTERFACCIA 5 - MODERAZIONE PIATTAFORMA
    case 'accedi_segnalazioni':
        $dati = $controller5->accedi_segnalazioni();
        View::render('segnalazioni', $dati);
        break;

    case 'seleziona_utente':
        $id = (int)($_GET['id'] ?? 0);
        $dati = $controller5->seleziona_utente($id);
        View::render('utente', $dati);
        break;

    case 'conferma_ban':
        $dati = $controller5->conferma_ban(
            $_POST['tipo']        ?? '',
            $_POST['durata']      ?? '',
            $_POST['motivazione'] ?? '',
            $_POST['gravita']     ?? '',
            $_POST['descrizione'] ?? ''
        );
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;









































































    default:
        View::render('404', []);
        break;
}*/



































































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