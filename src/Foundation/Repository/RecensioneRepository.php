<?php
namespace InkMaster\Foundation\Repository;

use InkMaster\Entity\Recensione;
use InkMaster\Entity\Cliente;
use InkMaster\Entity\Studio;
use InkMaster\Entity\Tatuatore;
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

    public function deleteRecensione(int $idRecensione): bool
    {
        // Implementazione del metodo per eliminare la recensione
        // Per adesso, simulo l'eliminazione e ritorno true per indicare successo
        return true;
    }
}
