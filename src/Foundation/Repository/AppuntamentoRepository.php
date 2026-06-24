<?php
namespace InkMaster\Foundation\Repository;

use InkMaster\Entity\Appuntamento;
use InkMaster\Entity\Cliente;
use InkMaster\Entity\Studio;
use InkMaster\Entity\Tatuatore;
use InkMaster\Enum\Citta;
use DateTime;

class AppuntamentoRepository
{
    private $em;

    public function __construct($entityManager = null)
    {
        $this->em = $entityManager;
    }

    

    public function findAppuntamentiByStudioId(int $idStudio): array
    {
        return $this->em->getRepository(Appuntamento::class)->findBy(['studio' => $idStudio]);
    }

    public function countPrenotazioniAttive(): int
    {
        // Aggiusta 'CONFERMATO' a ciò che per te significa "prenotazione attiva"
        return $this->em->getRepository(Appuntamento::class)->count(['stato' => 'CONFERMATO']);
    }
}