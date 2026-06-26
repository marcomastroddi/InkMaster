<?php
namespace InkMaster\Control\ControllerStudio;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Foundation\SessionManager;
use InkMaster\Entity\Appuntamento;

class GestionePagamenti
{
    private PersistentManager $pm;

    public function __construct()
    {
        $this->pm = PersistentManager::getInstance();
    }

    public function visualizzaPagamenti(): array
    {
        $idStudio = (int) SessionManager::get('id_studio', 1);

        if (!$idStudio) {
            return ['status' => 'error', 'message' => 'Devi essere loggato come studio.'];
        }

        $confermati  = $this->pm->findAppuntamentiByStudioIdAndStato($idStudio, 'CONFERMATO');
        $daPagare    = $this->pm->findAppuntamentiByStudioIdAndStato($idStudio, 'DA_PAGARE');
        $completati  = $this->pm->findAppuntamentiByStudioIdAndStato($idStudio, 'COMPLETATO');

        $totMese   = $this->pm->totalePagatiByStudioMese($idStudio);
        $totAnno   = $this->pm->totalePagatiByStudioAnno($idStudio);
        $totSempre = $this->pm->totalePagatiByStudio($idStudio);

        return [
            'status'       => 'success',
            'confermati'   => $confermati,
            'da_pagare'    => $daPagare,
            'tot_mese'     => $totMese,
            'tot_anno'     => $totAnno,
            'tot_sempre'   => $totSempre,
            'n_completati' => count($completati),
        ];
    }

    public function abilitaPagamento(int $idAppuntamento, float $costo): array
    {
        $appuntamento = $this->pm->read(Appuntamento::class, $idAppuntamento);

        if ($appuntamento === null) {
            return ['status' => 'error', 'message' => 'Appuntamento non trovato.'];
        }

        if ($appuntamento->getStato() !== 'CONFERMATO') {
            return ['status' => 'error', 'message' => 'Solo gli appuntamenti confermati possono essere abilitati al pagamento.'];
        }

        $appuntamento->setStato('DA_PAGARE');
        $appuntamento->setCosto($costo);
        $this->pm->update();

        return ['status' => 'success', 'message' => 'Pagamento abilitato per €' . number_format($costo, 2)];
    }
}