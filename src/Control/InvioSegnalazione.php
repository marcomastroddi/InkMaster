<?php

namespace InkMaster\Control;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Foundation\SessionManager;

class InvioSegnalazione
{

    private PersistentManager $pm;

    public function __construct()
    {
        $this->pm = PersistentManager::getInstance();
    }
    public function apriFormSegnalazione(string $tipoTarget, int $idTarget): array
    {
        
    
    
        return [
            'status' => 'success',
            'interfaccia' => 'Form invio segnalazione'
        ];
    }
}
