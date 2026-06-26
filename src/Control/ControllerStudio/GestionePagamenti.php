<?php

namespace InkMaster\Control\ControllerStudio;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Foundation\SessionManager;

class GestionePagamenti
{
    private PersistentManager $pm;

    public function __construct()
    {
        $this->pm = PersistentManager::getInstance();
    }

    public function visualizzaPagamenti(): array
    {
        $idStudio = (int)SessionManager::get('id_studio');

        $confermati  = $this->pm->findAppuntamentiByStudioIdAndStato($idStudio, 'CONFERMATO');
        $da_pagare   = $this->pm->findAppuntamentiByStudioIdAndStato($idStudio, 'DA_PAGARE');
        $tot_mese    = $this->pm->totalePagatiByStudioMese($idStudio);
        $tot_anno    = $this->pm->totalePagatiByStudioAnno($idStudio);
        $tot_sempre  = $this->pm->totalePagatiByStudio($idStudio);
        $n_completati = $this->pm->countCompletatiByStudio($idStudio);

        return compact('confermati', 'da_pagare', 'tot_mese', 'tot_anno', 'tot_sempre', 'n_completati');
    }

    public function abilitaPagamento(int $idAppuntamento, float $costo): array
    {
        $app = $this->pm->read(\InkMaster\Entity\Appuntamento::class, $idAppuntamento);

        if (!$app || $app->getStudio()->getId() !== (int)SessionManager::get('id_studio')) {
            return ['status' => 'error', 'message' => 'Appuntamento non trovato.'];
        }
        if ($app->getStato() !== 'CONFERMATO') {
            return ['status' => 'error', 'message' => 'Stato non valido.'];
        }
        if ($costo <= 0) {
            return ['status' => 'error', 'message' => 'Importo non valido.'];
        }

        $app->setStato('DA_PAGARE');
        $app->setCosto($costo);
        $this->pm->update();

        return ['status' => 'success'];
    }
}