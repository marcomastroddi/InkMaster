<?php

namespace InkMaster\Control\ControllerStudio;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Entity\Studio;
use InkMaster\Entity\Tatuatore;
use InkMaster\Entity\Stile;
use DateTime;

class GestioneTeam
{
    private PersistentManager $pm;
    private int $idStudio;

    public function __construct(int $idStudio)
    {
        $this->pm = PersistentManager::getInstance();
        $this->idStudio = $idStudio;
    }

    public function visualizzaTeam(): array
    {
        $studio = $this->pm->read(Studio::class, $this->idStudio);

        if (!$studio) {
            return ['status' => 'error', 'message' => 'Studio non trovato'];
        }

        return [
            'status'    => 'success',
            'tatuatori' => $studio->getTatuatori()->toArray(),
            'stili'     => $this->pm->findAvailableStyles(),
        ];
    }

    public function aggiungiTatuatore(array $dati): array
    {
        $studio = $this->pm->read(Studio::class, $this->idStudio);

        if (!$studio) {
            return ['status' => 'error', 'message' => 'Studio non trovato'];
        }

        $tatuatore = new Tatuatore(
            $dati['nome'],
            $dati['cognome'],
            new DateTime($dati['data_nascita']),
            $studio
        );

        if (!empty($dati['stili'])) {
            foreach ($dati['stili'] as $idStile) {
                $stile = $this->pm->read(Stile::class, (int)$idStile);
                if ($stile) {
                    $tatuatore->addStile($stile);
                }
            }
        }

        $this->pm->create($tatuatore);

        return ['status' => 'success'];
    }

    public function eliminaTatuatore(int $idTatuatore): array
    {
        $tatuatore = $this->pm->read(Tatuatore::class, $idTatuatore);

        if (!$tatuatore) {
            return ['status' => 'error', 'message' => 'Tatuatore non trovato'];
        }

        if ($tatuatore->getStudio()->getId() !== $this->idStudio) {
            return ['status' => 'error', 'message' => 'Non autorizzato'];
        }

        $this->pm->delete($tatuatore);

        return ['status' => 'success'];
    }
}