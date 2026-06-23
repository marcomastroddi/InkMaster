<?php
namespace InkMaster\Foundation\Repository;

use InkMaster\Entity\Segnalazione;
use DateTime;

class SegnalazioneRepository
{
    private $em;

    public function __construct($entityManager = null)
    {
        $this->em = $entityManager;
    }

    public function findAllSegnalazioni(): array
    {
        return $this->em->getRepository(Segnalazione::class)->findAll();
    }

    public function countSegnalazioniAperte(): int
    {
        return $this->em->getRepository(Segnalazione::class)->count(['stato' => 'APERTA']);
    }
}