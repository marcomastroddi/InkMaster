<?php

namespace InkMaster\Control\ControllerComune;

use InkMaster\Entity\Cliente;
use InkMaster\Foundation\PersistentManager;
use InkMaster\Foundation\SessionManager;
use DateTime;

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

        $utente = $this->pm->findClienteByUsername($username)
            ?? $this->pm->findStudioByUsername($username)
            ?? $this->pm->findAmministratoreByUsername($username);

        if ($utente === null) {
            return ['status' => 'error', 'message' => 'Credenziali non valide'];
        }

        $data = [
            'nome'     => $utente->getNome(),
            'username' => $utente->getUsername(),
            'ruolo'    => SessionManager::get('ruolo'),
        ];

        if (method_exists($utente, 'getCognome')) {
            $data['cognome'] = $utente->getCognome();
        }

        if ($utente instanceof Cliente) {
            $data['email']         = $utente->getEmail();
            $data['data_nascita']  = $utente->getDataNascita()->format('Y-m-d');
            $data['posizione']     = $utente->getPosizione() ?? '';
        }

        return ['status' => 'success', 'data' => $data];
    }

    public function modificaDati(array $dati): array
    {
        $username = SessionManager::get('username');

        if (!$username) {
            return ['status' => 'error', 'message' => 'Devi essere loggato.'];
        }

        $utente = $this->pm->findClienteByUsername($username)
            ?? $this->pm->findStudioByUsername($username)
            ?? $this->pm->findAmministratoreByUsername($username);

        if ($utente === null) {
            return ['status' => 'error', 'message' => 'Credenziali non valide'];
        }

        if (!empty($dati['nome']))    $utente->setNome($dati['nome']);
        if (!empty($dati['cognome']) && method_exists($utente, 'setCognome')) {
            $utente->setCognome($dati['cognome']);
        }

        if ($utente instanceof Cliente) {
            if (!empty($dati['email']))  $utente->setEmail($dati['email']);
            if (!empty($dati['posizione'])) $utente->setPosizione($dati['posizione']);
            if (!empty($dati['data_nascita'])) {
                $utente->setDataNascita(new DateTime($dati['data_nascita']));
            }
            if (!empty($dati['username']) && $dati['username'] !== $username) {
                $utente->setUsername($dati['username']);
                SessionManager::set('username', $dati['username']);
            }
        }

        $this->pm->update();

        return [
            'status'  => 'success',
            'message' => 'Dati aggiornati con successo.',
        ];
    }

    public function cambiaPassword(string $vecchiaPassword, string $nuovaPassword): array
    {
        $username = SessionManager::get('username');

        if (!$username) {
            return ['status' => 'error', 'message' => 'Devi essere loggato.'];
        }

        $utente = $this->pm->findClienteByUsername($username)
            ?? $this->pm->findStudioByUsername($username)
            ?? $this->pm->findAmministratoreByUsername($username);

        if ($utente === null) {
            return ['status' => 'error', 'message' => 'Credenziali non valide'];
        }

        if (!password_verify($vecchiaPassword, $utente->getPassword())) {
            return ['status' => 'error', 'message' => 'Password attuale non corretta.'];
        }

        $utente->setPassword(password_hash($nuovaPassword, PASSWORD_BCRYPT));

        $utente->setPassword($nuovaPassword);
        $this->pm->update();

        return [
            'status'  => 'success',
            'message' => 'Password aggiornata con successo.',
        ];
    }
}