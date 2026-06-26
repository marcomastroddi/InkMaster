<?php
namespace InkMaster\Foundation\Repository;

use InkMaster\Entity\Recensione;
use InkMaster\Entity\Cliente;
use InkMaster\Entity\Studio;
use InkMaster\Entity\Tatuatore;
use InkMaster\Enum\Citta;
use DateTime;

class RecensioneRepository
{
    private $em;

    public function __construct($entityManager = null)
    {
        $this->em = $entityManager;
    }


    public function findByStudioId(int $idStudio): array
    {
        return $this->em->getRepository(Recensione::class)
            ->findBy(['studio' => $idStudio]);
    }
    
    public function findRecensioniPositiveRandom(int $limit): array
    {
        $recensioni = $this->em->getRepository(Recensione::class)
            ->findBy(['voto' => [4, 5]]);
        
        shuffle($recensioni);
        return array_slice($recensioni, 0, $limit);
    }

    public function findByClienteId(int $idCliente): array
    {
        return $this->em->getRepository(Recensione::class)->findBy(
            ['cliente' => $idCliente],
            ['data' => 'DESC']
        );
    }
}
