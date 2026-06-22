<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Carichiamo l'EntityManager reale dal file di configurazione di Doctrine
require_once __DIR__ . '/../vendor/autoload.php';
$entityManager = require_once __DIR__ . '/../config/bootstrap-doctrine.php';

use InkMaster\Control\ControllerCliente\RicercaVisualizzaStudi;
use InkMaster\Control\ControllerCliente\PrenotazionePagamento;
use InkMaster\Control\ControllerCliente\VisualizzaPortfolio;
use InkMaster\Control\ControllerStudio\GestionePortfolio;
use InkMaster\Control\ControllerStudio\GestioneClienti;
use InkMaster\Control\ControllerStudio\GestioneCalendario;
use InkMaster\Control\ControllerStudio\GestionePagamenti;
use InkMaster\Control\ControllerComune\GestioneRecensione;
use InkMaster\Control\ControllerComune\GestioneSegnalazione;
use InkMaster\Control\ControllerComune\GestioneProfilo;
use InkMaster\Control\ControllerComune\Login;
use InkMaster\Control\ControllerAmministratore\ModerazionePiattaforma;

use InkMaster\Foundation\SessionManager;
use InkMaster\Foundation\PersistentManager;
use InkMaster\Presentation\View;

SessionManager::start();
PersistentManager::getInstance($entityManager);

$controller = new RicercaVisualizzaStudi();
$controller2 = new PrenotazionePagamento();
$controller3 = new GestionePortfolio();
$controller4 = new VisualizzaPortfolio();
$controller5 = new GestioneRecensione();
$controller6 = new ModerazionePiattaforma();
$controllerLogin = new Login();
$controller8 = new GestioneSegnalazione();
$controller9 = new GestioneProfilo();
$controller10 = new GestioneClienti();
$controller11 = new GestioneCalendario();
$controller12 = new GestionePagamenti();

/*

//INTERFACCIA 1 - RICERCA E VISUALIZZAZIONE TATUATORI
$datiHome = $controller->mostra_home();
echo '<h2>mostra_home</h2><pre>';
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
*/
$datiStili = $controller->apri_stili_disponibili();
echo '<h2>apri_stili_disponibili</h2>';
echo '<pre>';
print_r($datiStili);
echo '</pre>';
/*
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
    'percorso_foto' => '/images/pubblicazioni/nuovo_tatuaggio.jpg',
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
$_SESSION['id_utente'] = 1; // simula il cliente loggato

$datiAvvio = $controller5->avvia_recensione(1);
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

$datiDashboard = $controller6->visualizzaDashboard();
echo '<h2>visualizzaDashboard</h2><pre>';
print_r($datiDashboard);
echo '</pre>';

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


//INTERFACCIA 8 - GESTISCI SEGNALAZIONE
$_SESSION['ruolo'] = 'cliente';
$_SESSION['id_utente'] = 1;

$datiFormSegnalazione = $controller8->apriFormSegnalazione('studio', 1);
echo '<h2>apriFormSegnalazione</h2><pre>';
print_r($datiFormSegnalazione);
echo '</pre>';

$datiInvioSegnalazione = $controller8->inviaSegnalazione('Spam o Truffa', 'Comportamento scorretto.', 'studio', 1);
echo '<h2>inviaSegnalazione</h2><pre>';
print_r($datiInvioSegnalazione);
echo '</pre>';

//INTERFACCIA 9 - GESTIONE PROFILO
$_SESSION['username'] = 'mario_rossi';
$_SESSION['ruolo'] = 'cliente';

$datiProfilo = $controller9->visualizzaProfilo();
echo '<h2>visualizzaProfilo</h2><pre>';
print_r($datiProfilo);
echo '</pre>';

$datiModifica = $controller9->modificaDati(['nome' => 'Mario', 'cognome' => 'Bianchi']);
echo '<h2>modificaDati</h2><pre>';
print_r($datiModifica);
echo '</pre>';

$datiPassword = $controller9->cambiaPassword('password123', 'nuovaPassword456');
echo '<h2>cambiaPassword</h2><pre>';
print_r($datiPassword);
echo '</pre>';

//INTERFACCIA 10 - GESTIONE CLIENTI
$_SESSION['id_studio'] = 1;

$datiClienti = $controller10->visualizzaClienti();
echo '<h2>visualizzaClienti</h2><pre>';
print_r($datiClienti);
echo '</pre>';

$datiStato = $controller10->aggiornaStato(1, 'COMPLETATO');
echo '<h2>aggiornaStato</h2><pre>';
print_r($datiStato);
echo '</pre>';

$datiPagamento = $controller10->aggiungiPagamento(1, 150.00);
echo '<h2>aggiungiPagamento</h2><pre>';
print_r($datiPagamento);
echo '</pre>';

//INTERFACCIA 11 - GESTIONE CALENDARIO
$_SESSION['id_studio'] = 1;

$datiCalendario = $controller11->visualizzaCalendario(6, 2024);
echo '<h2>visualizzaCalendario</h2><pre>';
print_r($datiCalendario);
echo '</pre>';

$datiGiorno = $controller11->visualizzaAppuntamentiDelGiorno('2024-06-01');
echo '<h2>visualizzaAppuntamentiDelGiorno</h2><pre>';
print_r($datiGiorno);
echo '</pre>';

//INTERFACCIA 12 - GESTIONE PAGAMENTI
$_SESSION['id_studio'] = 1;

$datiPagamenti = $controller12->visualizzaPagamenti();
echo '<h2>visualizzaPagamenti</h2><pre>';
print_r($datiPagamenti);
echo '</pre>';

*/












/*
SessionManager::start();

// ── Istanziazione dei controller ──
$controller      = new RicercaVisualizzaStudi();
$controller2     = new PrenotazionePagamento();
$controller3     = new GestionePortfolio();
$controller4     = new VisualizzaPortfolio();
$controller5     = new GestioneRecensione();
$controller6     = new ModerazionePiattaforma();
$controllerLogin = new Login();
$controller8     = new GestioneSegnalazione();
$controller9     = new GestioneProfilo();
$controller10    = new GestioneClienti();
$controller11    = new GestioneCalendario();
$controller12    = new GestionePagamenti();

// ── Lettura della rotta dal percorso dell'URL ──
$page = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') ?: 'home';

// ── Rotte che richiedono il login ──
$pagineProtette = [
    'portfolio_studio', 'form_pubblicazione', 'pubblica_pubblicazione', 'elimina_pubblicazione',
    'avvia_recensione', 'compila_recensione', 'pubblica_recensione', 'elimina_recensione',
    'dashboard_moderatore', 'accedi_segnalazioni', 'seleziona_utente', 'conferma_ban',
    'visualizza_profilo', 'modifica_dati', 'cambia_password',
    'visualizza_clienti', 'aggiorna_stato', 'aggiungi_pagamento',
    'visualizza_calendario', 'appuntamenti_del_giorno', 'visualizza_pagamenti',
    'dashboard_studio',
];

if (in_array($page, $pagineProtette) && !SessionManager::has('username')) {
    View::render('auth/login', ['message' => 'Devi effettuare il login']);
    exit;
}

switch ($page) {

    // ===== INTERFACCIA 1 - RICERCA E VISUALIZZAZIONE STUDI =====
    case 'home':
        View::render('ricerca/home', $controller->mostra_home());
        break;

    case 'cerca':
        View::render('ricerca/cerca', $controller->scegli_citta());
        break;

    case 'seleziona_posizione':
        $dati = $controller->seleziona_posizione($_GET['citta'] ?? '');
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    case 'stili':
        View::render('ricerca/stili', $controller->apri_stili_disponibili());
        break;

    case 'seleziona_stile':
        $dati = $controller->seleziona_stile($_GET['stile'] ?? '');
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    case 'inserisci_testo_ricerca':
        $dati = $controller->inserisci_testo_ricerca($_POST['testo'] ?? '');
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    case 'avvia_ricerca':
        View::render('ricerca/risultati', $controller->avvia_ricerca());
        break;

    case 'scegli_studio':
        View::render('ricerca/studio', $controller->scegli_studio((int)($_GET['id'] ?? 0)));
        break;

    case 'visualizza_recensioni':
        View::render('ricerca/recensioni', $controller->visualizza_recensioni((int)($_GET['id'] ?? 0)));
        break;

    // ===== INTERFACCIA 2 - PRENOTAZIONE E PAGAMENTO =====
    case 'scegli_tatuatore':
        View::render('prenotazione/scelta_stile', $controller2->scegli_tatuatore((int)($_GET['id'] ?? 0)));
        break;

    case 'scegli_stile':
        View::render('prenotazione/scelta_data', $controller2->scegli_stile((int)($_GET['id'] ?? 0)));
        break;

    case 'scegli_data':
        $dati = $controller2->scegli_data($_POST['data'] ?? '');
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    case 'richiedi_appuntamento':
        $dati = $controller2->richiedi_appuntamento(
            (int)($_POST['cliente_id'] ?? 0),
            $_POST['descrizione'] ?? ''
        );
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    case 'conferma_prenotazione':
        $dati = $controller2->confermaPrenotazione();
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    case 'accetta_richiesta':
        $dati = $controller2->accetta_richiesta((int)($_GET['id'] ?? 0));
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    case 'rifiuta_richiesta':
        $dati = $controller2->rifiuta_richiesta((int)($_GET['id'] ?? 0));
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    case 'concludi_appuntamento':
        $dati = $controller2->concludi_appuntamento(
            $_POST['stato'] ?? '',
            (float)($_POST['costo'] ?? 0)
        );
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    case 'avvia_pagamento':
        View::render('prenotazione/form_pagamento', $controller2->avvia_pagamento());
        break;

    case 'inserisci_dati_pagamento':
        $dati = $controller2->inserisci_dati_pagamento([
            'numero'       => $_POST['numero']       ?? '',
            'scadenza'     => $_POST['scadenza']     ?? '',
            'cvv'          => $_POST['cvv']          ?? '',
            'intestatario' => $_POST['intestatario'] ?? ''
        ]);
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    // ===== INTERFACCIA 3 - GESTIONE PORTFOLIO (studio loggato) =====
    case 'portfolio_studio':
        View::render('portfolio/portfolio', $controller3->apriPortfolio());
        break;

    case 'form_pubblicazione':
        View::render('portfolio/form_pubblicazione', $controller3->mostraFormPubblicazione());
        break;

    case 'pubblica_pubblicazione':
        $dati = $controller3->pubblicaPubblicazione([
            'titolo'        => $_POST['titolo']        ?? '',
            'descrizione'   => $_POST['descrizione']   ?? '',
            'percorso_foto' => $_POST['percorso_foto'] ?? '',
            'stile'         => $_POST['stile']         ?? ''
        ]);
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    case 'elimina_pubblicazione':
        $dati = $controller3->eliminaPubblicazione((int)($_POST['id'] ?? 0));
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    // ===== INTERFACCIA 4 - VISUALIZZAZIONE PORTFOLIO (pubblico) =====
    case 'portfolio_pubblico':
        View::render('portfolio/portfolio_pubblico', $controller4->apriPortfolio((int)($_GET['id'] ?? 0)));
        break;

    case 'dettagli_pubblicazione':
        View::render('portfolio/dettagli_pubblicazione', $controller4->visuaizzaDettagliPubblicazione((int)($_GET['id'] ?? 0)));
        break;

    // ===== INTERFACCIA 5 - GESTIONE RECENSIONI =====
    case 'avvia_recensione':
        View::render('recensioni/form_recensione', $controller5->avvia_recensione((int)($_GET['id'] ?? 0)));
        break;

    case 'compila_recensione':
        $dati = $controller5->compila_recensione(
            (int)($_POST['voto'] ?? 0),
            $_POST['titolo'] ?? '',
            $_POST['descrizione'] ?? '',
            $_FILES['foto']['name'] ?? '',
            (int)($_POST['idTatuatore'] ?? 0),
            $_POST['stile'] ?? ''
        );
        View::render('recensioni/anteprima_recensione', $dati);
        break;

    case 'pubblica_recensione':
        View::render('recensioni/conferma_recensione', $controller5->pubblica_recensione());
        break;

    case 'elimina_recensione':
        $dati = $controller5->eliminaRecensione((int)($_POST['id'] ?? 0));
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    // ===== INTERFACCIA 6 - MODERAZIONE PIATTAFORMA =====
    case 'dashboard_moderatore':
        View::render('moderatore/dashboard_moderatore', $controller6->visualizzaDashboard());
        break;

    case 'accedi_segnalazioni':
        View::render('moderatore/segnalazioni', $controller6->accedi_segnalazioni());
        break;

    case 'seleziona_utente':
        View::render('moderatore/utente', $controller6->seleziona_utente((int)($_GET['id'] ?? 0)));
        break;

    case 'conferma_ban':
        $dati = $controller6->conferma_ban(
            $_POST['tipo']        ?? '',
            $_POST['durata']      ?? '',
            $_POST['motivazione'] ?? '',
            $_POST['gravita']     ?? '',
            $_POST['descrizione'] ?? ''
        );
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    // ===== INTERFACCIA 7 - LOGIN / LOGOUT =====
    case 'login':
        $dati = $controllerLogin->login($_POST['username'] ?? '', $_POST['password'] ?? '');
        if ($dati['status'] === 'success') {
            $destinazioni = [
                'cliente'        => '/home',
                'studio'         => '/dashboard_studio',
                'amministratore' => '/dashboard_moderatore',
            ];
            header('Location: ' . ($destinazioni[$dati['ruolo']] ?? '/home'));
            exit;
        }
        View::render('auth/login', $dati);
        break;

    case 'logout':
        $controllerLogin->logout();
        header('Location: /home');
        exit;

    // ===== INTERFACCIA 8 - GESTISCI SEGNALAZIONE =====
    case 'form_segnalazione':
        $dati = $controller8->apriFormSegnalazione(
            $_GET['tipo'] ?? '',
            (int)($_GET['id'] ?? 0)
        );
        View::render('profilo/form_segnalazione', $dati);
        break;

    case 'invia_segnalazione':
        $dati = $controller8->inviaSegnalazione(
            $_POST['motivo']      ?? '',
            $_POST['descrizione'] ?? '',
            $_POST['tipo_target'] ?? '',
            (int)($_POST['id_target'] ?? 0)
        );
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    // ===== INTERFACCIA 9 - GESTIONE PROFILO =====
    case 'visualizza_profilo':
        View::render('profilo/profilo', $controller9->visualizzaProfilo());
        break;

    case 'modifica_dati':
        $dati = $controller9->modificaDati([
            'nome'    => $_POST['nome']    ?? '',
            'cognome' => $_POST['cognome'] ?? ''
        ]);
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    case 'cambia_password':
        $dati = $controller9->cambiaPassword(
            $_POST['vecchia_password'] ?? '',
            $_POST['nuova_password']   ?? ''
        );
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    // ===== INTERFACCIA 10 - GESTIONE CLIENTI =====
    case 'visualizza_clienti':
        View::render('studio/clienti', $controller10->visualizzaClienti());
        break;

    case 'aggiorna_stato':
        $dati = $controller10->aggiornaStato(
            (int)($_POST['id_appuntamento'] ?? 0),
            $_POST['stato'] ?? ''
        );
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    case 'aggiungi_pagamento':
        $dati = $controller10->aggiungiPagamento(
            (int)($_POST['id_appuntamento'] ?? 0),
            (float)($_POST['importo'] ?? 0)
        );
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    // ===== INTERFACCIA 11 - GESTIONE CALENDARIO =====
    case 'visualizza_calendario':
        $dati = $controller11->visualizzaCalendario(
            (int)($_GET['mese'] ?? date('n')),
            (int)($_GET['anno'] ?? date('Y'))
        );
        View::render('studio/calendario', $dati);
        break;

    case 'appuntamenti_del_giorno':
        $dati = $controller11->visualizzaAppuntamentiDelGiorno($_GET['data'] ?? '');
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    // ===== INTERFACCIA 12 - GESTIONE PAGAMENTI =====
    case 'visualizza_pagamenti':
        View::render('studio/pagamenti', $controller12->visualizzaPagamenti());
        break;

    // ===== DASHBOARD STUDIO (landing dopo il login dello studio) =====
    case 'dashboard_studio':
        View::render('studio/dashboard_studio', []);
        break;

    // ===== 404 =====
    default:
        View::render('errori/404', []);
        break;
}
*/























































































