<?php
namespace InkMaster\Control\ControllerComune;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Foundation\SessionManager;

class Login
{
    private PersistentManager $pm;

    public function __construct()
    {
        $this->pm = PersistentManager::getInstance();
    }

    public function login(string $username, string $password): array
    {
        // Inizializziamo la variabile che conterrà l'utente trovato
        $utente = null;

        // Ricerca a cascata nelle 3 tabelle distinte tramite metodi implementati in Foundatio 
        
        // Tentativo 1: È un Cliente?
        $utente = $this->pm->findClienteByUsername($username);

        // Tentativo 2: Se non è un cliente, è uno Studio?
        if ($utente === null) {
            $utente = $this->pm->findStudioByUsername($username);
        }

        // Tentativo 3: Se non è nessuno dei precedenti, è un Amministratore?
        if ($utente === null) {
            $utente = $this->pm->findAdminByUsername($username);
        }

        // Controllo di sicurezza: se l'username non esiste in nessuna tabella
        if ($utente === null) {
            return ['status' => 'error', 'message' => 'Credenziali non valide'];
        }

        // Verifica della password tramite hash sicuro (funziona per tutte e 3 le classi perché hanno getPassword())
        if (!password_verify($password, $utente->getPassword())) {
            return ['status' => 'error', 'message' => 'Credenziali non valide'];
        }

        // Sfruttiamo il metodo getRuolo
        $ruolo = $utente->getRuolo(); 

        // Salvataggio dei dati in sessione
        SessionManager::set('username', $username);
        SessionManager::set('ruolo', $ruolo);
        SessionManager::set('idUtente', $utente->getId());

        // 7. Gestione delle logiche specifiche a ciascun ruolo
        switch ($ruolo) {
            case 'cliente':
                $interfaccia = 'DashboardCliente';
                break;

            case 'studio':
                // Essendo uno studio, l'id_utente corrisponde all'id_studio necessario per le dashboard
                SessionManager::set('id_studio', $utente->getId());
                $interfaccia = 'DashboardStudio';
                break;

            case 'amministratore':
                $interfaccia = 'DashboardAdmin';
                break;

            default:
                return ['status' => 'error', 'message' => 'Ruolo non identificato internamente'];
        }

        // 8. Risposta finale con successo e reindirizzamento corretto
        return [
            'status'      => 'success',
            'interfaccia' => $interfaccia,
            'ruolo'       => $ruolo
        ];
    }

    public function logout(): array
    {
        SessionManager::destroy();
        return [
            'status'      => 'success',
            'interfaccia' => 'Home',
            'message'     => 'Logout effettuato con successo'
        ];
    }
}