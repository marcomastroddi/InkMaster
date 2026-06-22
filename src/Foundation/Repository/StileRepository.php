<?php
namespace InkMaster\Foundation\Repository;

use InkMaster\Entity\Stile;

class StileRepository
{
    private $em;

    public function __construct($entityManager = null)
    {
        $this->em = $entityManager;
    }

    /**
     * @return Stile[]
     */
    public function findAvailableStyles(): array {
        return $this->em->getRepository(Stile::class)->findAll();
    }
    
    // Fab, per adesso restituisce sempre lo stesso stile fittizio, ma in futuro potrà fare query sul DB
    public function findById(int $id): ?Stile
    {
        return $this->findAvailableStyles()[0] ?? null;
    }
}