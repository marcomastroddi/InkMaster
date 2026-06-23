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
        //Recupero lo username dell'utente dalla sessione
        $username = SessionManager::get('username');

        //Controllo dello username
        if (!$username) {
            return ['status' => 'error', 'message' => 'Devi essere loggato.'];
        }

        // Tentativo 1: È un Cliente?
        $utente = $this->pm->findClienteByUsername($username);

        // Tentativo 2: Se non è un cliente, è uno Studio?
        if ($utente === null) {
            $utente = $this->pm->findStudioByUsername($username);
        }

        // Tentativo 3: Se non è nessuno dei precedenti, è un Amministratore?
        if ($utente === null) {
            $utente = $this->pm->findAmministratoreByUsername($username);
        }

        // Controllo di sicurezza: se l'username non esiste in nessuna tabella
        if ($utente === null) {
            return ['status' => 'error', 'message' => 'Credenziali non valide'];
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
        //Recupero lo username dell'utente dalla sessione
        $username = SessionManager::get('username');

        //Controllo dello username
        if (!$username) {
            return ['status' => 'error', 'message' => 'Devi essere loggato.'];
        }

        // Tentativo 1: È un Cliente?
        $utente = $this->pm->findClienteByUsername($username);

        // Tentativo 2: Se non è un cliente, è uno Studio?
        if ($utente === null) {
            $utente = $this->pm->findStudioByUsername($username);
        }

        // Tentativo 3: Se non è nessuno dei precedenti, è un Amministratore?
        if ($utente === null) {
            $utente = $this->pm->findAmministratoreByUsername($username);
        }

        // Controllo di sicurezza: se l'username non esiste in nessuna tabella
        if ($utente === null) {
            return ['status' => 'error', 'message' => 'Credenziali non valide'];
        }

        if (!empty($dati['nome']))    $utente->setNome($dati['nome']);
        
        if (!empty($dati['cognome']) && method_exists($utente, 'setCognome')) $utente->setCognome($dati['cognome']);

        $this->pm->create($utente);

        return [
            'status'      => 'success',
            'message'     => 'Dati aggiornati con successo.',
            'interfaccia' => 'Profilo aggiornato'
        ];
    }

    public function cambiaPassword(string $vecchiaPassword, string $nuovaPassword): array
    {
        //Recupero lo username dell'utente dalla sessione
        $username = SessionManager::get('username');

        //Controllo dello username
        if (!$username) {
            return ['status' => 'error', 'message' => 'Devi essere loggato.'];
        }

        // Tentativo 1: È un Cliente?
        $utente = $this->pm->findClienteByUsername($username);

        // Tentativo 2: Se non è un cliente, è uno Studio?
        if ($utente === null) {
            $utente = $this->pm->findStudioByUsername($username);
        }

        // Tentativo 3: Se non è nessuno dei precedenti, è un Amministratore?
        if ($utente === null) {
            $utente = $this->pm->findAmministratoreByUsername($username);
        }

        // Controllo di sicurezza: se l'username non esiste in nessuna tabella
        if ($utente === null) {
            return ['status' => 'error', 'message' => 'Credenziali non valide'];
        }

        if ($utente->getPassword() !== $vecchiaPassword) {
            return ['status' => 'error', 'message' => 'Password attuale non corretta.'];
        }

        $utente->setPassword($nuovaPassword);
        $this->pm->create($utente);

        return [
            'status'      => 'success',
            'message'     => 'Password aggiornata con successo.',
            'interfaccia' => 'Profilo'
        ];
    }
}