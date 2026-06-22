<?php

namespace InkMaster\Control\ControllerCliente;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Foundation\SessionManager;
class VisualizzaPortfolio
{
    private PersistentManager $pm;

    public function __construct()
    {
        $this->pm = PersistentManager::getInstance();
    }

    public function apriPortfolio(int $idStudio): array
    {
        if(empty($idStudio))
        {
            return [
                'status' => 'error',
                'message' => 'ID Studio mancante o non valido.'
            ];
        }

        //Chiamata al layer foundation per recuperare il portfolio dello studio
        $portfolio = $this->pm->findPortfolioByStudioId($idStudio);

        return [
            'status' => 'success',
            'data' => $portfolio
        ];
    }

    public function visuaizzaDettagliPubblicazione(int $idPubblicazione): array
    {
        if(empty($idPubblicazione))
        {
            return [
                'status' => 'error',
                'message' => 'ID Pubblicazione mancante o non valido.'
            ];
        }

        //Chiamata al layer foundation per recuperare i dettagli della pubblicazione
        $dettagli = $this->pm->findDettagliPubblicazione($idPubblicazione);

        return [
            'status' => 'success',
            'data' => $dettagli
        ];
    }

}