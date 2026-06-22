<?php

namespace InkMaster\Control\ControllerComune;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Foundation\SessionManager;

class GestioneProfilo
{
    private PersistentManager $pm;

    public function __construct()
    {
        $this->pm = PersistentManager::getInstance();
    }

    public function visualizzaProfilo(): array
    {
        $username = SessionManager::get('username');

        if (!$username) {
            return ['status' => 'error', 'message' => 'Devi essere loggato.'];
        }

        $utente = $this->pm->findByUsername($username);

        if ($utente === null) {
            return ['status' => 'error', 'message' => 'Utente non trovato.'];
        }

        $data = [
            'nome'     => $utente->getNome(),
            'username' => $utente->getUsername(),
            'ruolo'    => SessionManager::get('ruolo')
        ];

        
        if (method_exists($utente, 'getCognome')) {
            $data['cognome'] = $utente->getCognome();
        }

        return [
            'status' => 'success',
            'data'   => $data
        ];
    }

    public function modificaDati(array $dati): array
    {
        $username = SessionManager::get('username');

        if (!$username) {
            return ['status' => 'error', 'message' => 'Devi essere loggato.'];
        }

        $utente = $this->pm->findByUsername($username);

        if ($utente === null) {
            return ['status' => 'error', 'message' => 'Utente non trovato.'];
        }

        if (!empty($dati['nome']))    $utente->setNome($dati['nome']);
        
        if (!empty($dati['cognome']) && method_exists($utente, 'setCognome')) $utente->setCognome($dati['cognome']);

        $this->pm->save($utente);

        return [
            'status'      => 'success',
            'message'     => 'Dati aggiornati con successo.',
            'interfaccia' => 'Profilo aggiornato'
        ];
    }

    public function cambiaPassword(string $vecchiaPassword, string $nuovaPassword): array
    {
        $username = SessionManager::get('username');

        if (!$username) {
            return ['status' => 'error', 'message' => 'Devi essere loggato.'];
        }

        $utente = $this->pm->findByUsername($username);

        if ($utente === null) {
            return ['status' => 'error', 'message' => 'Utente non trovato.'];
        }

        if ($utente->getPassword() !== $vecchiaPassword) {
            return ['status' => 'error', 'message' => 'Password attuale non corretta.'];
        }

        $utente->setPassword($nuovaPassword);
        $this->pm->save($utente);

        return [
            'status'      => 'success',
            'message'     => 'Password aggiornata con successo.',
            'interfaccia' => 'Profilo'
        ];
    }
}