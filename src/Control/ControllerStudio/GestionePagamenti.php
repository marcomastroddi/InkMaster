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
        $idStudio = SessionManager::get('id_studio', 1);

        if (!$idStudio) {
            return ['status' => 'error', 'message' => 'Devi essere loggato come studio.'];
        }

        $pagamenti = $this->pm->findPagamentiByStudioId($idStudio);

        $completati = [];
        $inCorso    = [];

        foreach ($pagamenti as $pagamento) {
            if ($pagamento->getStato() === 'COMPLETATO') {
                $completati[] = $pagamento;
            } else {
                $inCorso[] = $pagamento;
            }
        }

        return [
            'status' => 'success',
            'data'   => [
                'completati' => $completati,
                'in_corso'   => $inCorso
            ]
        ];
    }
}