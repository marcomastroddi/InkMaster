<?php
namespace InkMaster\Foundation;

use InkMaster\Entity\Tatuatore;
use InkMaster\Entity\Studio;
use InkMaster\Enum\Citta;
use DateTime;

class TatuatoreRepository
{
    private $em;

    public function __construct($entityManager = null)
    {
        $this->em = $entityManager;
    }

    public function findById(int $id): ?Tatuatore
    {
        $studio = new Studio(
            'InkMaster Roma Centro',
            '12345678901',
            Citta::Roma,
            'roma.centro@inkmaster.it',
            'Studio storico nel cuore di Roma.',
            '0612345678',
            ['lun-ven' => '10:00-19:00'],
            ['lun-ven' => '19:00']
        );

        return new Tatuatore(
            'Marco',
            'Neri',
            'password123',
            new DateTime('1988-03-22'),
            $studio
        );
    }
}