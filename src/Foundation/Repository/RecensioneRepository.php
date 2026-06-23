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
        $recensione = new Recensione(
            $voto,
            new DateTime(),
            $cliente,
            $studio,
            $titolo,
            $stile,
            $tatuatore,
            $descrizione,
            $foto
        );

        // da implementare con il db:
        // $this->em->persist($recensione);
        // $this->em->flush();

        return $recensione;
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
}
