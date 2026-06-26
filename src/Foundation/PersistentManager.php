<?php
namespace InkMaster\Foundation;

use InkMaster\Foundation\Repository\StileRepository;
use InkMaster\Foundation\Repository\StudioRepository;
use InkMaster\Foundation\Repository\SegnalazioneRepository;
use InkMaster\Foundation\Repository\PubblicazioneRepository;
use InkMaster\Foundation\Repository\RecensioneRepository;
use InkMaster\Foundation\Repository\TatuatoreRepository;
use InkMaster\Foundation\Repository\ClienteRepository;
use InkMaster\Foundation\Repository\AppuntamentoRepository;
use InkMaster\Foundation\Repository\AmministratoreRepository;
use InkMaster\Foundation\Repository\PagamentoRepository;

use InkMaster\Entity\Studio;
use InkMaster\Entity\Cliente;
use InkMaster\Entity\Amministratore;

/**
 * PersistentManager
 * ------------------------------------------------------------------
 * Unico punto di accesso al database (facciata sui repository Doctrine).
 * I controller chiamano SOLO questa classe, mai i repository direttamente.
 *
 * - CRUD generico per-id: create / read / update / delete
 * - Query di dominio: metodi find...By... raggruppati per controller
 */
class PersistentManager
{
    private static ?PersistentManager $instance = null;
    private $em;

    private StileRepository $stileRepository;
    private StudioRepository $studioRepository;
    private SegnalazioneRepository $segnalazioneRepository;
    private RecensioneRepository $recensioneRepository;
    private PubblicazioneRepository $pubblicazioneRepository;
    private TatuatoreRepository $tatuatoreRepository;
    private ClienteRepository $clienteRepository;
    private AppuntamentoRepository $appuntamentoRepository;
    private AmministratoreRepository $amministratoreRepository;
    private PagamentoRepository $pagamentoRepository;

    // ==================================================================
    // COSTRUZIONE (Singleton) + aggancio dell'EntityManager
    // ==================================================================
    private function __construct($entityManager = null)
    {
        // Se nessuno lo passa, carichiamo l'EntityManager vero dal bootstrap
        if ($entityManager === null) {
            $entityManager = require __DIR__ . '/../../config/bootstrap-doctrine.php';
        }
        $this->em = $entityManager;

        // I repository ricevono l'EntityManager reale
        $this->stileRepository         = new StileRepository($entityManager);
        $this->studioRepository        = new StudioRepository($entityManager);
        $this->segnalazioneRepository  = new SegnalazioneRepository($entityManager);
        $this->recensioneRepository    = new RecensioneRepository($entityManager);
        $this->pubblicazioneRepository = new PubblicazioneRepository($entityManager);
        $this->tatuatoreRepository     = new TatuatoreRepository($entityManager);
        $this->clienteRepository       = new ClienteRepository($entityManager);
        $this->appuntamentoRepository  = new AppuntamentoRepository($entityManager);
        $this->amministratoreRepository = new AmministratoreRepository($entityManager);
        $this->pagamentoRepository     = new PagamentoRepository($entityManager);
    }

    public static function getInstance($entityManager = null): PersistentManager
    {
        if (self::$instance === null) {
            self::$instance = new self($entityManager);
        }
        return self::$instance;
    }

    // ==================================================================
    // CRUD GENERICO — usato da (quasi) tutti i controller
    // ==================================================================

    /** Inserisce una nuova entità nel DB (persist + flush). */
    public function create(object $entity): void
    {
        $this->em->persist($entity);
        $this->em->flush();
    }

    /** Applica le modifiche a entità già gestite da Doctrine (solo flush). */
    public function update(): void
    {
        $this->em->flush();
    }

    /** Legge un singolo record per classe + id. */
    public function read(string $className, int $id): ?object
    {
        return $this->em->find($className, $id);
    }

    /** Legge tutti i record di una classe (es. per popolare i form). */
    public function readAll(string $className): array
    {
        return $this->em->getRepository($className)->findAll();
    }

    /** Elimina fisicamente un'entità dal DB. */
    public function delete(object $entity): void
    {
        $this->em->remove($entity);
        $this->em->flush();
    }

    // ==================================================================
    // RICERCA & HOME — RicercaVisualizzaStudi
    // ==================================================================

    /** Stili disponibili (home + form di pubblicazione del portfolio). */
    public function findAvailableStyles(): array
    {
        return $this->stileRepository->findAvailableStyles();
    }

    /** Ricerca studi in base ai criteri (città/stile/testo). */
    public function findAvailableStudios($criteri): array
    {
        return $this->studioRepository->findAvailableStudios($criteri);
    }

    /** Studi random in evidenza nella home. */
    public function findStudiRandom(int $limit): array
    {
        return $this->studioRepository->findStudiRandom($limit);
    }

    /** Recensioni positive random in evidenza nella home. */
    public function findRecensioniPositiveRandom(int $limit): array
    {
        return $this->recensioneRepository->findRecensioniPositiveRandom($limit);
    }

    /** Recensioni di uno studio (scheda studio). */
    public function findRecensioniByStudioId(int $idStudio): array
    {
        return $this->recensioneRepository->findByStudioId($idStudio);
    }

    // ==================================================================
    // PORTFOLIO — GestionePortfolio (studio) + VisualizzaPortfolio (pubblico)
    // ==================================================================

    /** Pubblicazioni di uno studio. */
    public function findPortfolioByStudioId(int $idStudio): array
    {
        return $this->studioRepository->findPortfolioByStudioId($idStudio);
    }

    /** Dettaglio di una singola pubblicazione. */
    public function findDettagliPubblicazione(int $idPubblicazione): ?Object
    {
        return $this->pubblicazioneRepository->findDettagliPubblicazione($idPubblicazione);
    }

    /** Crea una nuova pubblicazione nel portfolio dello studio. */
    public function savePubblicazione(int $idStudio, array $infoPubblicazione)
    {
        return $this->pubblicazioneRepository->savePubblicazione($idStudio, $infoPubblicazione);
    }

    /** Elimina una pubblicazione dal portfolio. */
    public function deletePubblicazione(int $idPubblicazione): bool
    {
        return $this->pubblicazioneRepository->deletePubblicazione($idPubblicazione);
    }

    // ==================================================================
    // RECENSIONI — GestioneRecensione (form di inserimento)
    // ==================================================================

    /** Tatuatori di uno studio (per scegliere chi recensire). */
    public function findTatuatoriByStudioId(int $idStudio): array
    {
        return $this->tatuatoreRepository->findTatuatoriByStudioId($idStudio);
    }

    /** Stili offerti da uno studio (per il form recensione). */
    public function findStiliByStudioId(int $idStudio): array
    {
        return $this->stileRepository->findStiliByStudioId($idStudio);
    }

    // ==================================================================
    // DASHBOARD STUDIO — GestioneClienti / GestioneCalendario / GestionePagamenti
    // ==================================================================

    /** Appuntamenti di uno studio (clienti + calendario). */
    public function findAppuntamentiByStudioId(int $idStudio): array
    {
        return $this->appuntamentoRepository->findAppuntamentiByStudioId($idStudio);
    }

    /** Pagamenti ricevuti da uno studio. */
    public function findPagamentiByStudioId(int $idStudio): array
    {
        return $this->pagamentoRepository->findPagamentiByStudioId($idStudio);
    }

    /** Prenotazioni di un cliente (area personale). */
    public function findAppuntamentiByClienteId(int $idCliente): array
    {
        return $this->appuntamentoRepository->findByClienteId($idCliente);
    }

    /** Recensioni scritte da un cliente (area personale). */
    public function findRecensioniByClienteId(int $idCliente): array
    {
        return $this->recensioneRepository->findByClienteId($idCliente);
    }
    // ==================================================================
    // MODERAZIONE — ModerazionePiattaforma (segnalazioni + KPI dashboard)
    // ==================================================================

    /** Tutte le segnalazioni da moderare. */
    public function findAllSegnalazioni(): array
    {
        return $this->segnalazioneRepository->findAllSegnalazioni();
    }

    /** Trova il ban attivo di un utente per id e tipo ('cliente'|'studio'). */
    public function findBanByUtente(int $utenteId, string $tipo): ?\InkMaster\Entity\Ban
    {
        return $this->em->getRepository(\InkMaster\Entity\Ban::class)->findOneBy([
            'utenteId'   => $utenteId,
            'utenteTipo' => $tipo,
        ]);
    }

    /** Conta i tatuatori per ogni stile (usato nei grafici dashboard). */
    public function countTatuatoriPerStile(): array
    {
        return $this->em->createQueryBuilder()
            ->select('s.nome, COUNT(t.id) as cnt')
            ->from(\InkMaster\Entity\Tatuatore::class, 't')
            ->join('t.stili', 's')
            ->groupBy('s.id, s.nome')
            ->orderBy('cnt', 'DESC')
            ->getQuery()->getResult();
    }

    /** Conta gli appuntamenti per stato (usato nei grafici dashboard). */
    public function countAppuntamentiPerStato(): array
    {
        return $this->em->createQueryBuilder()
            ->select('a.stato, COUNT(a.id) as cnt')
            ->from(\InkMaster\Entity\Appuntamento::class, 'a')
            ->groupBy('a.stato')
            ->getQuery()->getResult();
    }

    /** Trova tutte le segnalazioni CHIUSE che hanno come target l'utente indicato. */
    public function findSegnalazioniChiuseByTarget(int $utenteId, string $tipo): array
    {
        $campo = $tipo === 'cliente' ? 'cliente' : 'studio';
        return $this->em->getRepository(\InkMaster\Entity\Segnalazione::class)->findBy([
            $campo  => $utenteId,
            'stato' => 'CHIUSA',
        ]);
    }

    /** KPI: numero clienti registrati. */
    public function countClienti(): int
    {
        return $this->clienteRepository->countClienti();
    }

    /** KPI: numero studi registrati. */
    public function countStudi(): int
    {
        return $this->studioRepository->countStudi();
    }

    /** KPI: segnalazioni ancora aperte. */
    public function countSegnalazioniAperte(): int
    {
        return $this->segnalazioneRepository->countSegnalazioniAperte();
    }

    /** KPI: prenotazioni attive. */
    public function countPrenotazioniAttive(): int
    {
        return $this->appuntamentoRepository->countPrenotazioniAttive();
    }

    // ==================================================================
    // AUTENTICAZIONE — Autenticazione (login: ricerca per username e ruolo)
    // ==================================================================

    /** Cerca un cliente per username. */
    public function findClienteByUsername(string $username): ?Cliente
    {
        return $this->clienteRepository->findClienteByUsername($username);
    }

    /** Cerca uno studio per username. */
    public function findStudioByUsername(string $username): ?Studio
    {
        return $this->studioRepository->findStudioByUsername($username);
    }

    /** Cerca un amministratore per username. */
    public function findAmministratoreByUsername(string $username): ?Amministratore
    {
        return $this->amministratoreRepository->findAmministratoreByUsername($username);
    }

    // ==================================================================
    // REGISTRAZIONE — Registrazione (controllo unicità username)
    // ==================================================================

    /** Vero se lo username è libero in TUTTE le tabelle utente (cliente, studio, admin). */
    public function usernameDisponibile(string $username): bool
    {
        return $this->findClienteByUsername($username) === null
            && $this->findStudioByUsername($username) === null
            && $this->findAmministratoreByUsername($username) === null;
    }


}