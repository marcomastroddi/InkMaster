<?php
namespace InkMaster\Control\ControllerCliente;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Foundation\SessionManager;

class AreaPersonale
{
    private PersistentManager $pm;

    public function __construct()
    {
        $this->pm = PersistentManager::getInstance();
    }

    public function visualizza(): array
    {
        $idCliente    = (int) SessionManager::get('idUtente');
        $appuntamenti = $this->pm->findAppuntamentiByClienteId($idCliente);
        $recensioni   = $this->pm->findRecensioniByClienteId($idCliente);

        return [
            'appuntamenti' => $appuntamenti,
            'recensioni'   => $recensioni,
        ];
    }
}