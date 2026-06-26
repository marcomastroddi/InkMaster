<?php
namespace InkMaster\Foundation\Repository;

use InkMaster\Entity\PubblicazioneTatuaggio;
use InkMaster\Entity\Studio;
use InkMaster\Entity\Stile;
use DateTime;

class PubblicazioneRepository
{
    private $em;

    public function __construct($entityManager = null)
    {
        $this->em = $entityManager;
    }

    public function findDettagliPubblicazione(int $idPubblicazione): ?PubblicazioneTatuaggio
    {
        return $this->em->find(PubblicazioneTatuaggio::class, $idPubblicazione);
    }

    public function savePubblicazione(int $idStudio, array $infoPubblicazione): bool
    {
        $studio = $this->em->find(Studio::class, $idStudio);

        if ($studio === null) {
            return false;
        }

        $pubblicazione = new PubblicazioneTatuaggio(
            $infoPubblicazione['titolo'],
            $infoPubblicazione['data'],
            $infoPubblicazione['ora'],
            $studio,
            $infoPubblicazione['percorso_foto'],
            $infoPubblicazione['descrizione'] ?? null,
            $infoPubblicazione['posizione']   ?? null,
            $infoPubblicazione['grandezza']   ?? null,
            isset($infoPubblicazione['costo']) && $infoPubblicazione['costo'] !== ''
                ? (float) $infoPubblicazione['costo']
                : null
        );

        // Collega lo stile se è stato passato un ID valido
        if (!empty($infoPubblicazione['stile_id'])) {
            $stile = $this->em->find(Stile::class, (int) $infoPubblicazione['stile_id']);
            if ($stile !== null) {
                $pubblicazione->addStile($stile);
            }
        }

        $this->em->persist($pubblicazione);
        $this->em->flush();

        return true;
    }

    public function deletePubblicazione(int $idPubblicazione): bool
    {
        $pubblicazione = $this->em->find(PubblicazioneTatuaggio::class, $idPubblicazione);

        if ($pubblicazione === null) {
            return false;
        }

        $this->em->remove($pubblicazione);
        $this->em->flush();

        return true;
    }
}
