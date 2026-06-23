<?php

namespace InkMaster\Foundation\Repository;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Entity\Pubblicazione;
use InkMaster\Entity\Studio;
use InkMaster\Entity\Tatuaggio;
use InkMaster\Enum\Citta;
use DateTime;

class PubblicazioneRepository
{
    private $em;

    public function __construct($entityManager = null)
    {
        $this->em = $entityManager;
    }

    public function findDettagliPubblicazione(int $idPubblicazione): ?Pubblicazione
    {
        return $this->em->find(Pubblicazione::class, $idPubblicazione);
    }

    public function savePubblicazione($idStudio, $infoPubblicazione)
    {
        // Implementazione del metodo per salvare la pubblicazione
        //Per adesso, simulo il salvataggio e ritorno true per indicare successo
        return true;
    }

    public function deletePubblicazione(int $idPubblicazione): bool
    {
        // Implementazione del metodo per eliminare la pubblicazione
        //Per adesso, simulo l'eliminazione e ritorno true per indicare successo
        return true;
    }
}