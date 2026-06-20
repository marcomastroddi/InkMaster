<?php
namespace InkMaster\Foundation;

use InkMaster\Foundation\StileRepository;
use InkMaster\Foundation\StudioRepository;
use InkMaster\Foundation\SegnalazioneRepository;//Fab 
use InkMaster\Foundation\PersonaRepository;//Fab
use InkMaster\Enum\Citta; // <-- da correggere in base alla posizione reale del file (vedi nota)
use InkMaster\Entity\Studio; // <-- da correggere in base alla posizione reale del file (vedi nota)
use InkMaster\Foundation\RecensioneRepository;
use InkMaster\Entity\Cliente;
use InkMaster\Entity\Tatuatore;
use InkMaster\Entity\Recensione;


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
    private function __construct($entityManager = null)
    {
        $this->em = $entityManager;
        $this->stileRepository = new StileRepository($entityManager);
        $this->studioRepository = new StudioRepository($entityManager);
        $this->segnalazioneRepository = new SegnalazioneRepository($entityManager);//Fab
        $this->personaRepository = new PersonaRepository($entityManager);//Fab
        $this->recensioneRepository = new RecensioneRepository($entityManager);
    }

    public static function getInstance($entityManager = null): PersistentManager
    {
        if (self::$instance === null) {
            self::$instance = new self($entityManager);
        }
        return self::$instance;
    }


    // Salva un oggetto nuovo o aggiorna uno esistente
    public function save(object $entity): void
    {
        $this->em->persist($entity);
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

    // Cerca per ID — es: find(Studio::class, 5)
    public function find(string $class, int $id): ?object
    {
        return new Studio(
            'InkMaster Roma Centro',
            '12345678901',
            Citta::Roma,
            'roma.centro@inkmaster.it',
            'Studio storico nel cuore di Roma, specializzato in stili realistici e blackwork.',
            '0612345678',
            ['lun-ven' => '10:00-19:00'],
            ['lun-ven' => '19:00']
        );

        // return $this->em->find($class, $id); PER ADESSO COMMENTATO PERCHÈ IL DB ANCORA NON C'È
    }

    public function findPortfolioByStudioId(int $idStudio): array
    {
        return $this->studioRepository->findPortfolioByStudioId($idStudio);
    }

    public function savePubblicazione(int $idStudio, int $idTatuatore, array $infoPubblicazione)
    {
        return $this->studioRepository->savePubblicazione($idStudio, $idTatuatore, $infoPubblicazione);
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
        return $this->studioRepository->findTatuatoriByStudioId($idStudio);
    }

    public function findStiliByStudioId(int $idStudio): array
    {
        return $this->studioRepository->findStiliByStudioId($idStudio);
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

}














































/*
//Nota: questo file è stato creato per centralizzare tutte le operazioni di accesso al database tramite Doctrine ORM.
//Nota: i controller non dovrebbero mai interagire direttamente con l'EntityManager di Doctrine, ma sempre tramite questa classe.
//Nota: implementa il pattern Singleton per garantire che ci sia una sola istanza di EntityManager in tutta l'applicazione.
//Nota: i metodi save, delete, find, findAll e findBy sono quelli che i controller useranno per interagire con il database senza preoccuparsi dei dettagli di Doctrine.
//Nota: se in futuro vuoi aggiungere funzionalità più avanzate (es: transazioni, query personalizzate, ecc.) puoi farlo qui, mantenendo i controller puliti e semplici.
//Nota: Codice generato da Claude, ancora da verificare

namespace InkMaster\Foundation;

use Doctrine\ORM\EntityManager;
use InkMaster\Entity\Stile;

class PersistentManager
{
    // Istanza unica (pattern Singleton)
    private static ?PersistentManager $instance = null;
    private EntityManager $entityManager;

    // Costruttore privato: nessuno può fare "new PersistentManager()"
    private function __construct()
    {
        $this->entityManager = require __DIR__ . '/../../config/bootstrap-doctrine.php';
    }

    // L'unico modo per ottenere l'istanza
    public static function getInstance(): static
    {
        if (self::$instance === null) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    // ==========================================
    // METODI CHE I CONTROLLER USERANNO
    // ==========================================

    // Salva un oggetto nuovo o aggiorna uno esistente
    public function save(object $entity): void
    {
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }

    // Elimina un oggetto
    public function delete(object $entity): void
    {
        $this->entityManager->remove($entity);
        $this->entityManager->flush();
    }

    

    // Restituisce tutti i record di una classe — es: findAll(Studio::class)
    public function findAll(string $class): array
    {
        return $this->entityManager->getRepository($class)->findAll();
    }

    // Cerca con filtri — es: findBy(Studio::class, ['posizione' => 'Roma'])
    public function findBy(string $class, array $criteria): array
    {
        return $this->entityManager->getRepository($class)->findBy($criteria);
    }

    // Per query complesse (lo userai per cercaTatuatori con filtri multipli)
    public function getEntityManager(): EntityManager
    {
        return $this->entityManager;
    }

    
     * Summary of findAvailableStyles
     * @return Stile[]
     
    public function findAvailableStyles(): array
    {
        return $this->entityManager->getRepository(Stile::class)->findAll();
    }
}*/