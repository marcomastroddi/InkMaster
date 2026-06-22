<?php
namespace InkMaster\Foundation;

use InkMaster\Foundation\Repository\StileRepository;
use InkMaster\Foundation\Repository\StudioRepository;
use InkMaster\Foundation\Repository\SegnalazioneRepository;//Fab 
use InkMaster\Foundation\Repository\PersonaRepository;//Fab
use InkMaster\Foundation\Repository\PubblicazioneRepository;
use InkMaster\Foundation\Repository\RecensioneRepository;
use InkMaster\Foundation\Repository\TatuatoreRepository;
use InkMaster\Foundation\Repository\ClienteRepository;
use InkMaster\Foundation\Repository\AppuntamentoRepository;
use InkMaster\Foundation\Repository\AmministratoreRepository;
use InkMaster\Foundation\Repository\PagamentoRepository;


use InkMaster\Enum\Citta; 
use InkMaster\Entity\Studio; 
use InkMaster\Entity\Cliente;
use InkMaster\Entity\Pubblicazione;
use InkMaster\Entity\Tatuatore;
use InkMaster\Entity\Recensione;
use InkMaster\Entity\Appuntamento;
use InkMaster\Entity\Stile;
use InkMaster\Entity\Segnalazione;



/*Nota Fab:Per conferma_ban non serve una repository — salva dati nel DB. Per ora con dati fittizi non c'è niente da salvare, 
quindi nel controller lasciamo il metodo com'è già.
Quando ci sarà il DB aggiungeremo save() in PersistentManager 
*/

class PersistentManager
{
    private static ?PersistentManager $instance = null;
    private $em;
    private StileRepository $stileRepository;
    private StudioRepository $studioRepository;
    private SegnalazioneRepository $segnalazioneRepository;//Fab
    private PersonaRepository $personaRepository;//Fab
    private RecensioneRepository $recensioneRepository;
    private PubblicazioneRepository $pubblicazioneRepository;
    private TatuatoreRepository $tatuatoreRepository;
    private ClienteRepository $clienteRepository;
    private AppuntamentoRepository $appuntamentoRepository;
    private AmministratoreRepository $amministratoreRepository;
    private PagamentoRepository $pagamentoRepository;

    private function __construct($entityManager = null)
    {
        // Se nessuno lo passa, carichiamo l'EntityManager vero dal bootstrap
        if ($entityManager === null) {
            $entityManager = require __DIR__ . '/../../config/bootstrap-doctrine.php'; //ponte all'EntityManager di Doctrine, che gestisce le operazioni sul database
        }
        $this->em = $entityManager;

        // ...i repository ora ricevono l'EM vero (non più null)
        $this->stileRepository = new StileRepository($entityManager);
        $this->studioRepository = new StudioRepository($entityManager);
        $this->segnalazioneRepository = new SegnalazioneRepository($entityManager);//Fab
        $this->personaRepository = new PersonaRepository($entityManager);//Fab
        $this->recensioneRepository = new RecensioneRepository($entityManager);
        $this->pubblicazioneRepository = new PubblicazioneRepository($entityManager);
        $this->tatuatoreRepository = new TatuatoreRepository($entityManager);
        $this->clienteRepository = new ClienteRepository($entityManager);
        $this->appuntamentoRepository = new AppuntamentoRepository($entityManager);
        $this->amministratoreRepository = new AmministratoreRepository($entityManager);
        $this->pagamentoRepository = new PagamentoRepository($entityManager);
    }

    public static function getInstance($entityManager = null): PersistentManager
    {
        if (self::$instance === null) {
            self::$instance = new self($entityManager);
        }
        return self::$instance;
    }

    // 1. CREATE & UPDATE (Persist & Flush)
    /**
     * Salva un oggetto nuovo nel database o prepara un oggetto esistente per l'aggiornamento.
     * In Doctrine, l'operazione di inserimento (Create) richiede il persist().
     */
    public function create(object $entity): void
    {
        $this->em->persist($entity);
        $this->em->flush();
    }

    // Cerca per ID — es: find(Studio::class, 5)
    public function find(string $class, int $id): ?object
    {
        return $this->em->find($class, $id);
    }

    /**
     * Applica le modifiche di un oggetto già esistente (Update).
     * Nota: Se l'oggetto è già stato recuperato da Doctrine nella stessa sessione, 
     * basta fare il flush(). Usiamo merge() o il flush diretto per sicurezza.
     */
    public function update(): void
    {
        $this->em->flush();
    }

    // 2. READ (Find)
    /**
     * Legge un singolo record basandosi sulla classe dell'Entity e sul suo ID.
     * Sostituisce la logica con il costrutto match usando direttamente Doctrine!
     */
    public function read(string $className, int $id): ?object
    {
        return $this->em->find($className, $id);
    }


    // Salva un'entità nuova (o aggiorna una esistente) nel DB
    public function save(object $entity): void
    {
        $this->em->persist($entity);
        $this->em->flush();
    }

    /**
     * Legge TUTTI i record di una determinata classe.
     * Utilissimo per tabelle come "Stile" o "Citta" per popolare i form.
     */
    public function readAll(string $className): array
    {
        return $this->em->getRepository($className)->findAll();
    }

    // 3. DELETE (Remove)
    /**
     * Elimina fisicamente un record dal database passando l'oggetto Entity.
     */
    public function delete(object $entity): void
    {
        $this->em->remove($entity);
        $this->em->flush();
    }

    public function findAvailableStyles(): array
    {
        return $this->stileRepository->findAvailableStyles();
    }

    public function findAvailableStudios($criteri): array
    {
        return $this->studioRepository->findAvailableStudios($criteri);
    }

    public function findPortfolioByStudioId(int $idStudio): array
    {
        return $this->studioRepository->findPortfolioByStudioId($idStudio);
    }

    public function savePubblicazione(int $idStudio, array $infoPubblicazione)
    {
        return $this->pubblicazioneRepository->savePubblicazione($idStudio, $infoPubblicazione);
    }

    public function deletePubblicazione(int $idPubblicazione): bool
    {
        return $this->pubblicazioneRepository->deletePubblicazione($idPubblicazione);
    }

    public function findDettagliPubblicazione(int $idPubblicazione): ?Object
    {
        return $this->pubblicazioneRepository->findDettagliPubblicazione($idPubblicazione);
    }

    //Fab
    public function findAllSegnalazioni(): array
    {
        return $this->segnalazioneRepository->findAllSegnalazioni();
    }
    //Fab
    public function findPersonaById(int $id): ?object
    {
        return $this->personaRepository->findById($id);
    }

    public function findTatuatoriByStudioId(int $idStudio): array
    {
        return $this->tatuatoreRepository->findTatuatoriByStudioId($idStudio);
    }

    public function findStiliByStudioId(int $idStudio): array
    {
        return $this->stileRepository->findStiliByStudioId($idStudio);
    }

    public function findTatuatoreById(int $idTatuatore): ?object
    {
        return $this->studioRepository->findTatuatoreById($idTatuatore);
    }

    public function salvaRecensione(
        int $voto,
        string $titolo,
        string $descrizione,
        ?string $foto,
        string $stile,
        Cliente $cliente,
        Studio $studio,
        Tatuatore $tatuatore
    ): Recensione {
        return $this->recensioneRepository->salvaRecensione($voto, $titolo, $descrizione, $foto, $stile, $cliente, $studio, $tatuatore);
    }

    public function deleteRecensione(int $idRecensione): bool
    {
        return $this->recensioneRepository->deleteRecensione($idRecensione);
    }

    public function findByUsername(string $username): ?object
    {
        // 1. Cerca tra i clienti
        $cliente = $this->clienteRepository->findByUsername($username);
        if ($cliente !== null) {
            return $cliente;
        }

        // 2. Cerca tra gli amministratori
        $admin = $this->amministratoreRepository->findByUsername($username);
        if ($admin !== null) {
            return $admin;
        }

        // 3. Cerca tra gli studi (per i tatuatori)
        $studio = $this->studioRepository->findByUsername($username);
        if ($studio !== null) {
            return $studio;
        }

        return null;
    }

    public function findRecensioniByStudioId(int $idStudio): array
    {
        return $this->recensioneRepository->findByStudioId($idStudio);
    }

    public function saveSegnalazione(Segnalazione $segnalazione): bool
    {
        return $this->segnalazioneRepository->saveSegnalazione($segnalazione);
    }



    public function findAppuntamentiByStudioId(int $idStudio): array
    {
        return $this->appuntamentoRepository->findAppuntamentiByStudioId($idStudio);
    }

    public function findPagamentiByStudioId(int $idStudio): array
    {
        return $this->pagamentoRepository->findPagamentiByStudioId($idStudio);
    }



    // Metodi per le statistiche della dashboard del moderatore
    public function countClienti(): int
    {
        return $this->clienteRepository->countClienti();
    }

    public function countStudi(): int
    {
        return $this->studioRepository->countStudi();
    }

    public function countSegnalazioniAperte(): int
    {
        return $this->segnalazioneRepository->countSegnalazioniAperte();
    }

    public function countPrenotazioniAttive(): int
    {
        return $this->appuntamentoRepository->countPrenotazioniAttive();
    }

    //Metodi per restituire dati random per la home page e la dashboard del moderatore
    public function findRecensioniPositiveRandom(int $limit): array
    {
        return $this->recensioneRepository->findRecensioniPositiveRandom($limit);
    }

    public function findStudiRandom(int $limit): array
    {
        return $this->studioRepository->findStudiRandom($limit);
    }
}











