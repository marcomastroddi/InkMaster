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


    public function findById(int $id): ?Tatuatore
    {
        $studio = new Studio(
            'InkMaster Roma Centro',
            '12345678901',
            Citta::Roma,
            'roma.centro@inkmaster.it',
            'inkmaster_roma',
            'password123',
            'Studio storico nel cuore di Roma.',
            '0612345678',
            ['lun-ven' => '10:00-19:00'],
            ['lun-ven' => '19:00']
        );

        return new Tatuatore(
            'Marco',
            'Neri',
            new DateTime('1988-03-22'),
            $studio
        );
    }
}