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

    public function savePubblicazione(int $idStudio, array $infoPubblicazione): bool
    {
        $studio = $this->em->find(\InkMaster\Entity\Studio::class, $idStudio);

        if ($studio === null) {
            return false;
        }

        $pubblicazione = new \InkMaster\Entity\Pubblicazione(
            $infoPubblicazione['titolo'],
            $infoPubblicazione['data'],
            $infoPubblicazione['ora'],
            $studio,
            $infoPubblicazione['percorso_foto'],
            $infoPubblicazione['descrizione']
        );

        $this->em->persist($pubblicazione);
        $this->em->flush();

        return true;
    }

    public function deletePubblicazione(int $idPubblicazione): bool
    {
        $pubblicazione = $this->em->find(\InkMaster\Entity\Pubblicazione::class, $idPubblicazione);

        if ($pubblicazione === null) {
            return false;
        }

        $this->em->remove($pubblicazione);
        $this->em->flush();

        return true;
    }
}