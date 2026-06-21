<?php
namespace InkMaster\Control;

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

        SessionManager::set('username', $username);
        SessionManager::set('ruolo', $utente->getRuolo());

        return [
            'status'      => 'success',
            'interfaccia' => 'Home',
            'ruolo'       => $utente->getRuolo()
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