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
        $utente = $this->pm->findByUsername($username);

        if ($utente === null) {
            return ['status' => 'error', 'message' => 'Credenziali non valide'];
        }

        if ($utente->getPassword() !== $password) {
            return ['status' => 'error', 'message' => 'Credenziali non valide'];
        }

        $ruolo = $utente->getRuolo();

        // Dati base sempre presenti dopo il login
        SessionManager::set('username', $username);
        SessionManager::set('ruolo', $ruolo);
        SessionManager::set('id_utente', $utente->getId());

        // Se è uno studio (o un tatuatore che usa le credenziali studio),
        // salviamo anche id_studio: serve a tutte le dashboard dello studio.
        if ($ruolo === 'studio') {
            SessionManager::set('id_studio', $utente->getId());
        }

        return [
            'status'      => 'success',
            'interfaccia' => 'Home',
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