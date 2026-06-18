<?php 
namespace InkMaster\Control;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Enum\Citta;
use InkMaster\Entity\Studio;
use InkMaster\Foundation\SessionManager;

class PrenotazionePagamento {

    private PersistentManager $pm;

    public function __construct()
    {
        $this->pm = PersistentManager::getInstance();
    }

    public function scegli_studio(int $studioId): array
    {
        // Usiamo il metodo find() già pronto in PersistentManager
        $studio = $this->pm->find(Studio::class, $studioId);

        // Controllo difensivo: se l'id non corrisponde a nessuno studio
        if ($studio === null) {
            return [
                'status' => 'error',
                'message' => 'Studio non trovato'
            ];
        }

        return [
            'status' => 'success',
            'interfaccia' => 'Interfaccia studio',
            'data' => 'pagina studio'                                       //'data' => $studio (da implementare con il db.)
        ];
    }
    
}