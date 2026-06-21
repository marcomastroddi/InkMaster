<?php
require_once __DIR__ . '/../vendor/autoload.php';

use InkMaster\Control\RicercaVisualizzaStudi;
use InkMaster\Control\PrenotazionePagamento;
use InkMaster\Control\GestionePortfolio;
use InkMaster\Control\VisualizzaPortfolio;
use InkMaster\Control\GestioneRecensione;
use InkMaster\Control\ModerazionePiattaforma;
use InkMaster\Foundation\SessionManager;
use InkMaster\Control\Login;




SessionManager::start();

$controller = new RicercaVisualizzaStudi();
$controller2 = new PrenotazionePagamento();
$controller3 = new GestionePortfolio();
$controller4 = new VisualizzaPortfolio();
$controller5 = new GestioneRecensione();
$controller6 = new ModerazionePiattaforma();
$controllerLogin = new Login();


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

$datiStudio = $controller->scegli_studio(1);
echo '<h2>scegli_studio</h2><pre>'; print_r($datiStudio); 
echo '</pre>';

$datiRecensioni = $controller->visualizza_recensioni(1);
echo '<h2>visualizza_recensioni</h2><pre>'; 
print_r($datiRecensioni); 
echo '</pre>';

//INTERFACCIA 2 - PRENOTAZIONE E PAGAMENTO

$datiTatuatore = $controller2->scegli_tatuatore(1);
echo '<h2>scegli_tatuatore</h2><pre>'; 
print_r($datiTatuatore); 
echo '</pre>';

$datiStile = $controller2->scegli_stile(1);
echo '<h2>scegli_stile</h2><pre>'; print_r($datiStile); echo '</pre>';

$datiData = $controller2->scegli_data('2024-06-01');
echo '<h2>scegli_data</h2><pre>'; print_r($datiData); echo '</pre>';

// Popoliamo la sessione per simulare gli step precedenti
$_SESSION['prenotazione'] = [
    'studio_id'       => 1,
    'tatuatore_id'    => 1,
    'stile_id'        => 1,
    'data'            => '2024-06-01',
    'appuntamento_id' => 1
];
$datiAppuntamento = $controller2->richiedi_appuntamento(1, 'Voglio un drago sul braccio');
echo '<h2>richiedi_appuntamento</h2><pre>'; print_r($datiAppuntamento); echo '</pre>';

// forziamo l'id fittizio perché save() non usa il DB
$_SESSION['prenotazione']['appuntamento_id'] = 1;

$datiConferma = $controller2->confermaPrenotazione();
echo '<h2>confermaPrenotazione</h2><pre>'; print_r($datiConferma); echo '</pre>';

// ripristiniamo la sessione per i test successivi
$_SESSION['prenotazione']['appuntamento_id'] = 1;

$datiAccetta = $controller2->accetta_richiesta(1);
echo '<h2>accetta_richiesta</h2><pre>'; print_r($datiAccetta); echo '</pre>';

$datiRifiuta = $controller2->rifiuta_richiesta(1);
echo '<h2>rifiuta_richiesta</h2><pre>'; print_r($datiRifiuta); echo '</pre>';

$datiConcludi = $controller2->concludi_appuntamento('COMPLETATO', 150.00);
echo '<h2>concludi_appuntamento</h2><pre>'; print_r($datiConcludi); echo '</pre>';

$datiAvviaPagamento = $controller2->avvia_pagamento();
echo '<h2>avvia_pagamento</h2><pre>'; print_r($datiAvviaPagamento); echo '</pre>';

$datiPagamento = $controller2->inserisci_dati_pagamento([
    'numero'       => '1234567890123456',
    'scadenza'     => '12/26',
    'cvv'          => '123',
    'intestatario' => 'Mario Rossi'
]);
echo '<h2>inserisci_dati_pagamento</h2><pre>'; print_r($datiPagamento); echo '</pre>';


//INTERFACCIA 3 - GESTIONE PORTFOLIO
$datiPortfolio = $controller3->apriPortfolio();
echo '<h2>apriPortfolio</h2>';
echo '<pre>';
print_r($datiPortfolio);
echo '</pre>';

$datiFormPubblicazione = $controller3->mostraFormPubblicazione();
echo '<h2>mostraFormPubblicazione</h2>';
echo '<pre>';
print_r($datiFormPubblicazione);
echo '</pre>';

$datiPubblicazioneTatuaggio = $controller3->pubblicaPubblicazione([
    'titolo' => 'Nuovo Tatuaggio',
    'descrizione' => 'Descrizione del nuovo tatuaggio',
    'percorso_immagine' => '/images/pubblicazioni/nuovo_tatuaggio.jpg',
    'stile' => 'Realistico'
]);
echo '<h2>pubblicaPubblicazione</h2>';
echo '<pre>';
print_r($datiPubblicazioneTatuaggio);
echo '</pre>';

$datiEliminaPubblicazione = $controller3->eliminaPubblicazione(1);
echo '<h2>eliminaPubblicazione</h2>';  
echo '<pre>';
print_r($datiEliminaPubblicazione);
echo '</pre>';

//INTERFACCIA 4 - VISUALIZZAZIONE PORTFOLIO
$datiPortfolio = $controller4->apriPortfolio(1);
echo '<h2>apriPortfolio</h2>';
echo '<pre>';
print_r($datiPortfolio);
echo '</pre>';

$datiDettagliPubblicazione = $controller4->visuaizzaDettagliPubblicazione(1);
echo '<h2>findDettagliPubblicazione</h2>';
echo '<pre>';
print_r($datiDettagliPubblicazione);
echo '</pre>';



//INTERFACCIA 5 - GESTIONE RECENSIONI
$datiAvvio = $controller5->avvia_recensione(1, 1);
echo '<h2>avvia_recensione</h2>';
echo '<pre>';
print_r($datiAvvio);
echo '</pre>';


$datiCompila = $controller5->compila_recensione(
    5,
    'Esperienza fantastica',
    'Il tatuatore è stato professionale e molto preciso, super contento del risultato.',
    'tatuaggio_drago.jpg',
    1,
    'Realistico'
);
echo '<h2>compila_recensione</h2>';
echo '<pre>';
print_r($datiCompila);
echo '</pre>';

$datiPubblica = $controller5->pubblica_recensione();
echo '<h2>pubblica_recensione</h2>';
echo '<pre>';
print_r($datiPubblica);
echo '</pre>';

$datiElimina = $controller5->eliminaRecensione(1);
echo '<h2>eliminaRecensione</h2>';
echo '<pre>';
print_r($datiElimina);
echo '</pre>';


//INTERFACCIA 6 - MODERAZIONE PIATTAFORMA
$datiSegnalazioni = $controller6->accedi_segnalazioni();
echo '<h2>accedi_segnalazioni</h2>';
echo '<pre>';
print_r($datiSegnalazioni);
echo '</pre>';

$datiUtente = $controller6->seleziona_utente(1);
echo '<h2>seleziona_utente</h2>';
echo '<pre>';
print_r($datiUtente);
echo '</pre>';

$datiBan = $controller6->conferma_ban('temporaneo', '7 giorni', 'spam', 'bassa', 'Utente ha inviato messaggi ripetuti');
echo '<h2>conferma_ban</h2>';
echo '<pre>';
print_r($datiBan);
echo '</pre>';

//INTERFACCIA 7 - LOGIN
$datiLogin = $controllerLogin->login('mario_rossi', 'password123');
echo '<h2>login</h2><pre>'; print_r($datiLogin); echo '</pre>';

$datiLogout = $controllerLogin->logout();
echo '<h2>logout</h2><pre>'; print_r($datiLogout); echo '</pre>';



























/*<?php
require_once __DIR__ . '/../vendor/autoload.php';

$page = $_GET['page'] ?? 'home';

$pagineProtette = ['scegli_studio', 'scegli_tatuatore', 'scegli_stile', 'scegli_data', 'richiedi_appuntamento', 'confermaPrenotazione', 'accetta_richiesta', 'rifiuta_richiesta', 'concludi_appuntamento', 'avvia_pagamento', 'inserisci_dati_pagamento', 'apriPortfolio', 'mostraFormPubblicazione', 'pubblicaTatuaggio', 'accedi_segnalazioni', 'seleziona_utente', 'conferma_ban'];

if (in_array($page, $pagineProtette) && !SessionManager::has('username')) {
    View::render('login', ['message' => 'Devi effettuare il login']);
    exit;
}

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

    case 'visualizza_recensioni':
    $id = (int)($_GET['id'] ?? 0);
    $dati = $controller->visualizza_recensioni($id);
    View::render('recensioni', $dati);
    break;


//INTERFACCIA 2 - PRENOTAZIONE E PAGAMENTO(in corso)

    case 'scegli_studio':
        $id = (int)($_GET['id'] ?? 0);
        $dati = $controller2->scegli_studio($id);
        View::render('studio', $dati);
        break;

    case 'scegli_tatuatore':
        $id = (int)($_GET['id'] ?? 0);
        $dati = $controller2->scegli_tatuatore($id);
        View::render('scelta_stile', $dati);
        break;

    case 'scegli_stile':
        $id = (int)($_GET['id'] ?? 0);
        $dati = $controller2->scegli_stile($id);
        View::render('scelta_data', $dati);
        break;

    case 'scegli_data':
        $data = $_POST['data'] ?? '';
        $dati = $controller2->scegli_data($data);
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    case 'richiedi_appuntamento':
        $clienteId   = (int)($_POST['cliente_id'] ?? 0);
        $descrizione = $_POST['descrizione'] ?? '';
        $dati = $controller2->richiedi_appuntamento($clienteId, $descrizione);
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    case 'confermaPrenotazione':
        $dati = $controller2->confermaPrenotazione();
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    case 'accetta_richiesta':
        $id = (int)($_GET['id'] ?? 0);
        $dati = $controller2->accetta_richiesta($id);
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    case 'rifiuta_richiesta':
        $id = (int)($_GET['id'] ?? 0);
        $dati = $controller2->rifiuta_richiesta($id);
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    case 'concludi_appuntamento':
        $stato = $_POST['stato'] ?? '';
        $costo = (float)($_POST['costo'] ?? 0);
        $dati = $controller2->concludi_appuntamento($stato, $costo);
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    case 'avvia_pagamento':
        $dati = $controller2->avvia_pagamento();
        View::render('form_pagamento', $dati);
        break;

    case 'inserisci_dati_pagamento':
        $datiCarta = [
            'numero'       => $_POST['numero']       ?? '',
            'scadenza'     => $_POST['scadenza']      ?? '',
            'cvv'          => $_POST['cvv']           ?? '',
            'intestatario' => $_POST['intestatario']  ?? ''
        ];
        $dati = $controller2->inserisci_dati_pagamento($datiCarta);
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;
 
        
//INTERFACCIA 3 - GESTIONE PROFILO UTENTE
    case 'apriPortfolio':
            $dati = $controller3->apriPortfolio();
            View::render('portfolio', $dati);
            break;

        case 'mostraFormPubblicazione':
            $dati = $controller3->mostraFormPubblicazione();
            View::render('form_pubblicazione', $dati);
            break;
        
        case 'pubblicaTatuaggio':
            $datiForm = [
                'titolo'        => $_POST['titolo']        ?? '',
                'descrizione'   => $_POST['descrizione']   ?? '',
                'percorso_foto' => $_POST['percorso_foto'] ?? '',
                'stile'         => $_POST['stile']         ?? ''
            ];
            $dati = $controller3->pubblicaTatuaggio($datiForm);
            header('Content-Type: application/json');
            echo json_encode($dati);
            break;

//INTERFACCIA 4 - VISUALIZZAZIONE PORTFOLIO
    case 'apriPortfolio':
        $idStudio = (int)($_GET['id'] ?? 0);
        $dati = $controller4->apriPortfolio($idStudio);
        View::render('portfolio_pubblico', $dati);
        break;

    case 'visualizzaDettagliPubblicazione':
        $idPubblicazione = (int)($_GET['id'] ?? 0);
        $dati = $controller4->visuaizzaDettagliPubblicazione($idPubblicazione);
        View::render('dettagli_pubblicazione', $dati);
        break;


//INTERFACCIA 5 - GESTIONE RECENSIONI
    case 'avvia_recensione':
        $idStudio = (int)($_GET['id'] ?? 0);
        $idCliente = (int)(SessionManager::get('id_utente_loggato') ?? 0);
        $dati = $controller4->avvia_recensione($idStudio, $idCliente);
        View::render('form_recensione', $dati);
        break;

    case 'compila_recensione':
        $dati = $controller4->compila_recensione(
            (int)($_POST['voto'] ?? 0),
            $_POST['titolo'] ?? '',
            $_POST['descrizione'] ?? '',
            $_FILES['foto']['name'] ?? '',
            (int)($_POST['idTatuatore'] ?? 0),
            $_POST['stile'] ?? ''
        );
        View::render('anteprima_recensione', $dati);
        break;

    case 'pubblica_recensione':
        $dati = $controller4->pubblica_recensione();
        View::render('conferma_recensione', $dati);
        break;


//INTERFACCIA 6 - MODERAZIONE PIATTAFORMA
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

//INTERFACCIA 7 - LOGIN
    case 'login':
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $dati = $controllerLogin->login($username, $password);
        
        if ($dati['status'] === 'success') {
            switch ($dati['ruolo']) {
                case 'cliente':
                    View::render('home', $dati);
                    break;
                case 'tatuatore':
                    View::render('portfolio', $dati);
                    break;
                case 'amministratore':
                    View::render('moderazione', $dati);
                    break;
            }
        } else {
            View::render('login', $dati);
        }
        break;

    case 'logout':
        $dati = $controllerLogin->logout();
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