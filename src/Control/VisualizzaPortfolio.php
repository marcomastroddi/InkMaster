<?php

namespace InkMaster\Control;

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

}