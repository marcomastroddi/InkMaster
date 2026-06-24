<?php

namespace InkMaster\Foundation\Repository;

use Doctrine\ORM\EntityRepository;

use InkMaster\Entity\Tatuatore;
use InkMaster\Entity\Studio;
use InkMaster\Enum\Citta;
use DateTime;


class TatuatoreRepository extends EntityRepository
{
    private $em;

    public function __construct($entityManager = null)
    {
        $this->em = $entityManager;
        parent::__construct($entityManager, $entityManager->getClassMetadata(Tatuatore::class));
    }

    //Recupera tutti i tatuatori associati ad uno specifico ID studio
    public function findTatuatoriByStudioId(int $idStudio): array
    {
        return $this->em->createQueryBuilder('t') // 't' è l'alias per Tatuatore
            ->select('t')
            ->from(Tatuatore::class, 't')
            ->where('t.studio = :idStudio')   // Filtriamo per la relazione 'studio'
            ->setParameter('idStudio', $idStudio) //Protegge
            ->getQuery()
            ->getResult(); // Ritorna un array di oggetti Tatuatore
    }

}