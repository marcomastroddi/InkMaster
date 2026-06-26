<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
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
use InkMaster\Control\ControllerStudio\GestioneTeam;
use InkMaster\Control\ControllerCliente\AreaPersonale;

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
    'elimina_recensione',
    'dashboard_moderatore', 'accedi_segnalazioni', 'conferma_ban', 'scarta_segnalazione', 'rimuovi_ban',
    'form_segnalazione', 'invia_segnalazione',
    'visualizza_profilo', 'modifica_dati', 'cambia_password',
    'visualizza_clienti', 'aggiorna_stato', 'aggiungi_pagamento',
    'visualizza_calendario', 'appuntamenti_del_giorno', 'visualizza_pagamenti',
    'dashboardStudio', 'prenota', 'scegliTatuatore', 'scegliStile', 'scegliData', 'mostraRiepilogo', 'richiediAppuntamento',
    'avvia_recensione', 'compila_recensione', 'gestisci_team', 'storico_appuntamenti', 'area_personale', 'visualizza_clienti', 'aggiorna_stato', 'aggiungi_pagamento', 'abilita_pagamento',
    'avvia_pagamento' , 'inserisci_dati_pagamento'
];

if (in_array($page, $pagineProtette) && !SessionManager::has('username')) {
    View::render('auth/login', ['message' => 'Devi effettuare il login']);
    exit;
}

// ── Rotte vietate agli studi loggati ──
$pagineVietateStudio = [
    'home', 'avvia_ricerca', 'scegli_studio',
    'visualizza_recensioni', 'seleziona_posizione', 'seleziona_stile',
    'inserisci_testo_ricerca', 'portfolio_pubblico', 'dettagli_pubblicazione',
    'prenota', 'scegliTatuatore', 'scegliStile', 'scegliData',
    'mostraRiepilogo', 'richiediAppuntamento', 'avvia_pagamento',
    'inserisci_dati_pagamento', 'avviaRecensione', 'compilaRecensione',
    'visualizzaRecensione', 'area_personale', 
];

if (in_array($page, $pagineVietateStudio) && SessionManager::get('ruolo') === 'studio') {
    header('Location: /dashboardStudio');
    exit;
}

switch ($page) {

    // ===== INTERFACCIA 1 - RICERCA E VISUALIZZAZIONE STUDI =====
    case 'home':
        View::render('ricerca/home', $controller->mostra_home());
        break;

    case 'seleziona_posizione':
        $dati = $controller->seleziona_posizione($_GET['citta'] ?? '');
        header('Content-Type: application/json');
        echo json_encode($dati);
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
        $studioId = (int)($_GET['id'] ?? 0);
        $page     = max(1, (int)($_GET['page'] ?? 1));
        $perPage  = 10;
        $result   = $controller->visualizza_recensioni($studioId);
        $tutteRec = $result['data'] ?? [];
        $totale   = count($tutteRec);
        $totPagine = (int)ceil($totale / $perPage);
        $recPagina = array_slice($tutteRec, ($page - 1) * $perPage, $perPage);
        View::render('ricerca/recensioni', [
            'studio'    => $result['studio'],
            'recensioni'=> $recPagina,
            'pagina'    => $page,
            'totPagine' => $totPagine,
            'studioId'  => $studioId,
            'totale'    => $totale,
        ]);
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
        $appId = (int)($_GET['id'] ?? 0);
        View::render('profilo/areaPersonale', array_merge(
            $controller2->avvia_Pagamento($appId),
            [
                'appuntamenti' => PersistentManager::getInstance()->findAppuntamentiByClienteId((int)SessionManager::get('idUtente')),
                'recensioni'   => PersistentManager::getInstance()->findRecensioniByClienteId((int)SessionManager::get('idUtente')),
                'mostra_overlay_pagamento' => true,
                'overlay_app_id' => $appId,
            ]
        ));
        break;

    case 'inserisci_dati_pagamento':
        $dati = $controller2->inserisci_Dati_Pagamento([
            'id_appuntamento' => $_POST['id_appuntamento'] ?? 0,
            'numero'          => $_POST['numero']          ?? '',
            'scadenza'        => $_POST['scadenza']        ?? '',
            'cvv'             => $_POST['cvv']             ?? '',
            'intestatario'    => $_POST['intestatario']    ?? '',
        ]);
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    // ===== INTERFACCIA 3 - GESTIONE PORTFOLIO (studio loggato) =====
    case 'portfolio_studio':
        View::render('portfolio/portfolioLatoStudio', $controller3->apriPortfolio());
        break;

    case 'form_pubblicazione':
        View::render('portfolio/form_pubblicazione', $controller3->mostraFormPubblicazione());
        break;

    case 'pubblica_pubblicazione':
    $errorMsg = null;
    $percorsoFoto = '';

    if (!isset($_FILES['percorso_foto']) || $_FILES['percorso_foto']['error'] !== UPLOAD_ERR_OK) {
        $errorMsg = 'Immagine obbligatoria.';
    } elseif (!in_array($_FILES['percorso_foto']['type'], ['image/jpeg','image/png','image/webp'])) {
        $errorMsg = 'Formato non supportato (usa JPG, PNG o WebP).';
    } elseif ($_FILES['percorso_foto']['size'] > 5 * 1024 * 1024) {
        $errorMsg = 'Immagine troppo grande (max 5 MB).';
    } else {
        $file = $_FILES['percorso_foto'];
        $estensione = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $nomeFile   = uniqid('tattoo_', true) . '.' . $estensione;
        $destDir    = __DIR__ . '/img/tatuaggi/';
        if (!is_dir($destDir)) {
            mkdir($destDir, 0755, true);
        }
        if (!move_uploaded_file($file['tmp_name'], $destDir . $nomeFile)) {
            $errorMsg = 'Errore nel salvataggio dell\'immagine.';
        } else {
            $percorsoFoto = '/img/tatuaggi/' . $nomeFile;
        }
    }

    if ($errorMsg !== null) {
        $datiForm = $controller3->mostraFormPubblicazione();
        $datiForm['error'] = $errorMsg;
        View::render('portfolio/form_pubblicazione', $datiForm);
        break;
    }

    $dati = $controller3->pubblicaPubblicazione([
        'titolo'        => $_POST['titolo']      ?? '',
        'descrizione'   => $_POST['descrizione'] ?? '',
        'percorso_foto' => $percorsoFoto,
        'stile'         => $_POST['stile']       ?? ''
    ]);

    if ($dati['status'] === 'success') {
        header('Location: /portfolio_studio');
        exit;
    }

    $datiForm = $controller3->mostraFormPubblicazione();
    $datiForm['error'] = $dati['message'] ?? 'Errore nel salvataggio.';
    View::render('portfolio/form_pubblicazione', $datiForm);
    break;

    case 'elimina_pubblicazione':
        $dati = $controller3->eliminaPubblicazione((int)($_POST['id'] ?? 0));
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    // ===== INTERFACCIA 4 - VISUALIZZAZIONE PORTFOLIO (pubblico) =====
    case 'portfolio_pubblico':
        $studioId = (int)($_GET['id'] ?? 0);
        $page = max(1, (int)($_GET['page'] ?? 1));
        $perPage = 12;
        $result = $controller4->apriPortfolio($studioId);
        $tuttePub = $result['data'] ?? [];
        $totale = count($tuttePub);
        $totPagine = (int)ceil($totale / $perPage);
        $pubPagina = array_slice($tuttePub, ($page - 1) * $perPage, $perPage);
        View::render('portfolio/portfolio_pubblico', [
            'data'      => $pubPagina,
            'status'    => empty($pubPagina) ? 'empty' : 'success',
            'pagina'    => $page,
            'totPagine' => $totPagine,
            'studioId'  => $studioId,
        ]);
        break;

    case 'dettagli_pubblicazione':
        View::render('portfolio/dettagli_pubblicazione', $controller4->visuaizzaDettagliPubblicazione((int)($_GET['id'] ?? 0)));
        break;

    // ===== INTERFACCIA 5 - GESTIONE RECENSIONI =====
    case 'avviaRecensione':
        $studioId = (int)($_GET['id'] ?? 0);
        $recDati = $controller5->mostraFormRecensione($studioId);
        $datiStudio = $controller->scegli_studio($studioId);
        $datiStudio['mostra_overlay_recensione'] = true;
        $datiStudio['overlay_rec_step'] = 'form';
        $datiStudio['rec_tatuatori'] = $recDati['data']['tatuatori'];
        $datiStudio['rec_stili'] = $recDati['data']['stili'];
        View::render('ricerca/studio', $datiStudio);
        break;

    case 'compilaRecensione':
        $percorsoFoto = null;
        if (!empty($_FILES['foto']['name'][0])) {
            $percorsi = [];
            foreach ($_FILES['foto']['tmp_name'] as $i => $tmp) {
                if ($_FILES['foto']['error'][$i] === 0) {
                    $ext = pathinfo($_FILES['foto']['name'][$i], PATHINFO_EXTENSION);
                    $nomeFile = uniqid('foto_') . '.' . $ext;
                    $destinazione = __DIR__ . '/img/recensioni/' . $nomeFile;
                    if (move_uploaded_file($tmp, $destinazione)) {
                        $percorsi[] = '/img/recensioni/' . $nomeFile;
                    }
                }
            }
            if (!empty($percorsi)) {
                $percorsoFoto = json_encode($percorsi);
            }
        }
        $dati = $controller5->compilaRecensione(
            (int)($_POST['voto'] ?? 0),
            $_POST['titolo'] ?? '',
            $_POST['descrizione'] ?? null,
            $percorsoFoto,
            (int)($_POST['tatuatore_id'] ?? 0),
            $_POST['stile'] ?? ''
        );
        $studioId = (int)(SessionManager::get('studio_selezionato') ?? 0);
        $controller5->pubblicaRecensione();
        $datiStudio = $controller->scegli_studio($studioId);
        $datiStudio['mostra_overlay_recensione'] = true;
        $datiStudio['overlay_rec_step'] = 'successo';
        View::render('ricerca/studio', $datiStudio);
        break;

    case 'elimina_recensione':
        $dati = $controller5->eliminaRecensione((int)($_POST['id'] ?? 0));
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    case 'visualizzaRecensione':
        $recId = (int)($_GET['id'] ?? 0);
        $pm = \InkMaster\Foundation\PersistentManager::getInstance();
        $recensione = $pm->read(\InkMaster\Entity\Recensione::class, $recId);
        $studioId = $recensione->getStudio()->getId();
        $datiStudio = $controller->scegli_studio($studioId);
        $datiStudio['mostra_overlay_recensione'] = true;
        $datiStudio['overlay_rec_step'] = 'dettaglio';
        $datiStudio['recensione_dettaglio'] = $recensione;
        View::render('ricerca/studio', $datiStudio);
        break;

    // ===== INTERFACCIA 6 - MODERAZIONE PIATTAFORMA =====
    case 'dashboard_moderatore':
        View::render('moderatore/dashboard_moderatore', $controller6->visualizzaDashboard());
        break;

    case 'accedi_segnalazioni':
        View::render('moderatore/segnalazioni', $controller6->accedi_segnalazioni());
        break;

    case 'conferma_ban':
        $controller6->conferma_ban(
            $_POST['motivazione'] ?? '',
            $_POST['gravita']     ?? '',
            $_POST['descrizione'] ?? '',
            (int)($_POST['seg_id'] ?? 0)
        );
        header('Location: /accedi_segnalazioni');
        exit;

    case 'scarta_segnalazione':
        $controller6->scarta_segnalazione((int)($_POST['seg_id'] ?? 0));
        header('Location: /accedi_segnalazioni');
        exit;

    case 'rimuovi_ban':
        $controller6->rimuovi_ban((int)($_POST['id'] ?? 0), $_POST['tipo'] ?? '');
        header('Location: /accedi_segnalazioni');
        exit;

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
            SessionManager::set('username', $_POST['username']);
            SessionManager::set('ruolo', 'studio');
            SessionManager::set('id_studio', $dati['idStudio']);
            header('Location: /dashboardStudio');
            exit;
        }
        View::render('auth/registrazioneStudio', $dati);
        break;

    case 'dashboardStudio':
        // Carica la vista della dashboard (adatta il percorso se necessario)
        View::render('studio/dashboardStudio', []); 
        break;

    // ===== INTERFACCIA 7.1 - LOGIN / LOGOUT =====
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dati = $controllerAutenticazione->login($_POST['username'] ?? '', $_POST['password'] ?? '');
            if ($dati['status'] === 'success') {
                $destinazioni = [
                    'cliente'        => '/home',
                    'studio' => '/dashboardStudio',
                    'amministratore' => '/dashboard_moderatore',
                ];
                header('Location: ' . ($destinazioni[$dati['ruolo']] ?? '/home'));
                exit;
            }
            View::render('auth/login', $dati);
        } else {
            View::render('auth/login', []);
        }
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
        if ($dati['status'] === 'success') {
            $ruolo = SessionManager::get('ruolo');
            header('Location: ' . ($ruolo === 'studio' ? '/visualizza_clienti' : '/home'));
            exit;
        }
        // errore: ritorna al form con messaggio
        $formDati = $controller8->apriFormSegnalazione($_POST['tipo_target'] ?? '', (int)($_POST['id_target'] ?? 0));
        $formDati['message'] = $dati['message'];
        View::render('profilo/form_segnalazione', $formDati);
        break;

    // ===== INTERFACCIA 9 - GESTIONE PROFILO =====
    case 'visualizza_profilo':
        View::render('profilo/profiloCliente', $controller9->visualizzaProfilo());
        break;

    case 'modifica_dati':
    $dati = $controller9->modificaDati([
        'nome'        => $_POST['nome']        ?? '',
        'cognome'     => $_POST['cognome']     ?? '',
        'username'    => $_POST['username']    ?? '',
        'email'       => $_POST['email']       ?? '',
        'telefono'    => $_POST['telefono']    ?? '',
        'posizione'   => $_POST['posizione']   ?? '',
        'descrizione' => $_POST['descrizione'] ?? '',
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

    // ===== INTERFACCIA — AREA PERSONALE CLIENTE =====
    case 'area_personale':
        $apController = new AreaPersonale();
        View::render('profilo/areaPersonale', $apController->visualizza());
        break;

    // ===== INTERFACCIA 10 - GESTIONE CLIENTI =====
    case 'visualizza_clienti':
        View::render('studio/AccettazioneClienti', $controller10->visualizzaClienti());
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

    case 'abilita_pagamento':
        $dati = $controller12->abilitaPagamento(
            (int)($_POST['id'] ?? 0),
            (float)($_POST['costo'] ?? 0)
        );
        header('Content-Type: application/json');
        echo json_encode($dati);
        break;

    case 'gestisci_team':
        $gt = new GestioneTeam((int)SessionManager::get('id_studio'));
        $result = $gt->visualizzaTeam();
        View::render('studio/GestisciTeam', [
            'tatuatori' => $result['tatuatori'],
            'stili'     => $result['stili'],
        ]);
        break;
    
    case 'aggiungi_tatuatore':
        $gt = new GestioneTeam((int)SessionManager::get('id_studio'));
        $gt->aggiungiTatuatore($_POST);
        header('Location: /gestisci_team');
        exit;

    case 'elimina_tatuatore':
        $gt = new GestioneTeam((int)SessionManager::get('id_studio'));
        $gt->eliminaTatuatore((int)($_POST['id'] ?? 0));
        header('Location: /gestisci_team');
        exit;

    case 'storico_appuntamenti':
        $stato = $_GET['stato'] ?? null;
        $dati = $controller10->visualizzaStorico($stato);
        View::render('studio/StoricoAppuntamenti', $dati);
        break;

    // ===== 404 =====
    default:
        View::render('errori/404', []);
        break;

}

