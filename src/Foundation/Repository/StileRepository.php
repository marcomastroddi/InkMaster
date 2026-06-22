<?php
namespace InkMaster\Foundation\Repository;

use Doctrine\ORM\EntityRepository;
use InkMaster\Entity\Stile;

class StileRepository extends EntityRepository
{
    private $em;

    public function __construct($entityManager = null)
    {
        $this->em = $entityManager;
        parent::__construct($entityManager, $entityManager->getClassMetadata(Stile::class));
    }

    /**
     * @return Stile[]
     */
    public function findAvailableStyles(): array {
        return $this->em->getRepository(Stile::class)->findAll();
    }

    //Recupera tutti gli stili associati all'ID di uno studio
    //andando a controllare i tatuatori associati a quello studio 
    public function findStiliByStudioId(int $idStudio): array
    {
        return $this->em->createQueryBuilder('s') // 's' è alias di stile
        ->select('DISTINCT s') // Forza Doctrine a scartare i duplicati
        ->from(Stile::class, 's')
        ->join('s.tatuatori', 't')        // Uniamo gli stili ai tatuatori (assumendo la relazione s.tatuatori)
        ->where('t.studio = :idStudio')   // Filtriamo i tatuatori in base allo studio
        ->setParameter('idStudio', $idStudio)
        ->getQuery()
        ->getResult();
    }
    
    // Fab, per adesso restituisce sempre lo stesso stile fittizio, ma in futuro potrà fare query sul DB
    public function findById(int $id): ?Stile
    {
        return $this->findAvailableStyles()[0] ?? null;
    }
}