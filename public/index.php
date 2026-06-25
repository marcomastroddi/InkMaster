<?php

// Carichiamo l'EntityManager reale dal file di configurazione di Doctrine
require_once __DIR__ . '/../vendor/autoload.php';
$entityManager = require_once __DIR__ . '/../config/bootstrap-doctrine.php';
require_once __DIR__ . '/../config/bootstrap-smarty.php';

use InkMaster\Control\ControllerCliente\RicercaVisualizzaStudi;
use InkMaster\Control\ControllerCliente\PrenotazionePagamento;
use InkMaster\Control\ControllerCliente\VisualizzaPortfolio;
use InkMaster\Control\ControllerStudio\GestionePortfolio;
use InkMaster\Control\ControllerStudio\GestioneClienti;
use InkMaster\Control\ControllerStudio\GestioneCalendario;
use InkMaster\Control\ControllerStudio\GestionePagamenti;
use InkMaster\Control\ControllerCliente\GestioneRecensione;
use InkMaster\Control\ControllerComune\GestioneSegnalazione;
use InkMaster\Control\ControllerComune\GestioneProfilo;
use InkMaster\Control\ControllerComune\Autenticazione;
use InkMaster\Control\ControllerComune\Registrazione;
use InkMaster\Control\ControllerAmministratore\ModerazionePiattaforma;

use InkMaster\Foundation\SessionManager;
use InkMaster\Foundation\PersistentManager;
use InkMaster\Presentation\View;

SessionManager::start();
PersistentManager::getInstance($entityManager);

// ── Istanziazione dei controller ──
$controller = new RicercaVisualizzaStudi();
$controller2 = new PrenotazionePagamento();
$controller3 = new GestionePortfolio();
$controller4 = new VisualizzaPortfolio();
$controller5 = new GestioneRecensione();
$controller6 = new ModerazionePiattaforma();
$controllerAutenticazione = new Autenticazione();
$controller8 = new GestioneSegnalazione();
$controller9 = new GestioneProfilo();
$controller10 = new GestioneClienti();
$controller11 = new GestioneCalendario();
$controller12 = new GestionePagamenti();
$controllerRegistrazione = new Registrazione();


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
]; //'prenota', 'scegliTatuatore', 'scegliStile', 'scegliData', 'richiediAppuntamento', da ri-inserire dopo

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
        View::render('ricerca/ElencoTatuatori', $controller->avvia_ricerca());        break;

    case 'scegli_studio':
        View::render('ricerca/studio', $controller->scegli_studio((int)($_GET['id'] ?? 0)));
        break;

    case 'visualizza_recensioni':
        View::render('ricerca/recensioni', $controller->visualizza_recensioni((int)($_GET['id'] ?? 0)));
        break;

    // ===== INTERFACCIA 2 - PRENOTAZIONE E PAGAMENTO =====
    case 'prenota':
        $studioId = (int)($_GET['id'] ?? SessionManager::get('prenotazione', [])['studio_id'] ?? 0);
        $studio = PersistentManager::getInstance()->read(\InkMaster\Entity\Studio::class, $studioId);
        $prenotazione = SessionManager::get('prenotazione', []);
        $prenotazione['studio_id'] = $studioId;
        SessionManager::set('prenotazione', $prenotazione);
        $datiStudio = $controller->scegli_studio($studioId);
        $datiStudio['mostra_overlay'] = true;
        $datiStudio['tatuatori'] = $studio->getTatuatori();
        View::render('ricerca/studio', $datiStudio);
        break;

    case 'scegliTatuatore':
        $dati = $controller2->scegli_tatuatore((int)($_GET['id'] ?? 0));
        $studioId = SessionManager::get('prenotazione', [])['studio_id'] ?? 0;
        $studio = PersistentManager::getInstance()->read(\InkMaster\Entity\Studio::class, $studioId);
        $datiStudio = $controller->scegli_studio($studioId);
        $datiStudio['mostra_overlay'] = true;
        $datiStudio['overlay_step'] = 'stile';
        $datiStudio['stili'] = $dati['data'];
        View::render('ricerca/studio', $datiStudio);
        break;

    case 'scegliStile':
        $controller2->scegli_stile((int)($_GET['id'] ?? 0));
        $studioId = SessionManager::get('prenotazione', [])['studio_id'] ?? 0;
        $datiStudio = $controller->scegli_studio($studioId);
        $datiStudio['mostra_overlay'] = true;
        $datiStudio['overlay_step'] = 'data';
        View::render('ricerca/studio', $datiStudio);
        break;

    case 'scegliData':
        $controller2->scegli_data($_POST['data'] ?? '');
        $studioId = SessionManager::get('prenotazione', [])['studio_id'] ?? 0;
        $datiStudio = $controller->scegli_studio($studioId);
        $datiStudio['mostra_overlay'] = true;
        $datiStudio['overlay_step'] = 'descrizione';
        View::render('ricerca/studio', $datiStudio);
        break;

    case 'richiediAppuntamento':
        $pren = SessionManager::get('prenotazione', []);
        $controller2->richiedi_appuntamento(
            (int)($_SESSION['idUtente'] ?? 0),
            $pren['descrizione'] ?? ''
        );
        $studioId = $pren['studio_id'] ?? 0;
        $tatuatore = PersistentManager::getInstance()->read(\InkMaster\Entity\Tatuatore::class, $pren['tatuatore_id'] ?? 0);
        $stile = PersistentManager::getInstance()->read(\InkMaster\Entity\Stile::class, $pren['stile_id'] ?? 0);
        $datiStudio = $controller->scegli_studio($studioId);
        $datiStudio['mostra_overlay'] = true;
        $datiStudio['overlay_step'] = 'conferma';
        $datiStudio['riepilogo'] = [
            'tatuatore'   => $tatuatore ? $tatuatore->getNome().' '.$tatuatore->getCognome() : '—',
            'stile'       => $stile ? $stile->getNome() : '—',
            'data'        => $pren['data'] ?? '—',
            'descrizione' => $pren['descrizione'] ?? '—',
        ];
        View::render('ricerca/studio', $datiStudio);
        break;
    
    case 'mostraRiepilogo':
        $pren = SessionManager::get('prenotazione', []);
        $pren['descrizione'] = $_POST['descrizione'] ?? '';
        SessionManager::set('prenotazione', $pren);
        $studioId = $pren['studio_id'] ?? 0;
        $tatuatore = PersistentManager::getInstance()->read(\InkMaster\Entity\Tatuatore::class, $pren['tatuatore_id'] ?? 0);
        $stile = PersistentManager::getInstance()->read(\InkMaster\Entity\Stile::class, $pren['stile_id'] ?? 0);
        $datiStudio = $controller->scegli_studio($studioId);
        $datiStudio['mostra_overlay'] = true;
        $datiStudio['overlay_step'] = 'riepilogo';
        $datiStudio['riepilogo'] = [
            'tatuatore'   => $tatuatore ? $tatuatore->getNome().' '.$tatuatore->getCognome() : '—',
            'stile'       => $stile ? $stile->getNome() : '—',
            'data'        => $pren['data'] ?? '—',
            'descrizione' => $pren['descrizione'],
        ];
        View::render('ricerca/studio', $datiStudio);
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
        View::render('recensioni/form_recensione', $controller5->mostraFormRecensione((int)($_GET['id'] ?? 0)));
        break;

    case 'compila_recensione':
        $dati = $controller5->compilaRecensione(
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
        View::render('recensioni/conferma_recensione', $controller5->pubblicaRecensione());
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
        View::render('moderatore/utente', $controller6->seleziona_utente(
            (int)($_GET['id'] ?? 0),
            $_GET['tipo'] ?? ''
        ));
        break;;

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

    // ===== INTERFACCIA 7.0 - REGISTRAZIONE (pubblica: cliente e studio) =====

    // --- GET: mostra i form ---
    case 'registrazioneCliente':
        View::render('auth/registrazioneCliente', []);
        break;

    case 'registrazioneStudio':
        View::render('auth/registrazioneStudio', []);
        break;

    // --- POST: esegue la registrazione ---
    case 'registraCliente':
    $dati = $controllerRegistrazione->registraCliente([
        'nome'              => $_POST['nome']              ?? '',
        'cognome'           => $_POST['cognome']           ?? '',
        'username'          => $_POST['username']          ?? '',
        'password'          => $_POST['password']          ?? '',
        'conferma_password' => $_POST['conferma_password'] ?? '',
        'data_nascita'      => $_POST['data_nascita']      ?? '',
        'email'             => $_POST['email']             ?? '',
        'posizione'         => $_POST['posizione']         ?? '',
    ]);
    if ($dati['status'] === 'success') {
        SessionManager::set('username', $_POST['username']);
        SessionManager::set('ruolo', 'cliente');
        SessionManager::set('idUtente', $dati['idUtente']);
        header('Location: /home');
        exit;
    }
    View::render('auth/registrazioneCliente', $dati);
    break;

    case 'registraStudio':
        $dati = $controllerRegistrazione->registraStudio([
            'nome'              => $_POST['nome']              ?? '',
            'partita_iva'       => $_POST['partita_iva']       ?? '',
            'posizione'         => $_POST['posizione']         ?? '',
            'email'             => $_POST['email']             ?? '',
            'username'          => $_POST['username']          ?? '',
            'password'          => $_POST['password']          ?? '',
            'conferma_password' => $_POST['conferma_password'] ?? '',
            'descrizione'       => $_POST['descrizione']       ?? '',
            'telefono'          => $_POST['telefono']          ?? '',
        ]);
        if ($dati['status'] === 'success') {
            header('Location: /login');
            exit;
        }
        View::render('auth/registrazioneStudio', $dati);
        break;

    // ===== INTERFACCIA 7.1 - LOGIN / LOGOUT =====
    case 'login':
        $dati = $controllerAutenticazione->login($_POST['username'] ?? '', $_POST['password'] ?? '');
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
        $controllerAutenticazione->logout();
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
            (float)($_POST['importo'] ?? 0),
            (int)($_POST['id_carta'] ?? 0)
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
























































































