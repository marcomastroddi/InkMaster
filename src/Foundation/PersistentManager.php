<?php
namespace InkMaster\Foundation;

class PersistentManager
{
    private static ?PersistentManager $instance = null;

    private function __construct()
    {
        // connessione al DB rimossa per il test
    }

    public static function getInstance(): static
    {
        if (self::$instance === null) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    public function findAvailableStyles(): array
    {
        return [
            ['nome' => 'Realistico'],
            ['nome' => 'Giapponese'],
            ['nome' => 'Blackwork'],
            ['nome' => 'Watercolor'],
            ['nome' => 'Tradizionale'],
        ];
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

    // Cerca per ID — es: find(Studio::class, 5)
    public function find(string $class, int $id): ?object
    {
        return $this->entityManager->find($class, $id);
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