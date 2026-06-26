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

        if (method_exists($utente, 'getCognome'))    $data['cognome']     = $utente->getCognome();
        if (method_exists($utente, 'getEmail'))      $data['email']       = $utente->getEmail();
        if (method_exists($utente, 'getTelefono'))   $data['telefono']    = $utente->getTelefono();
        if (method_exists($utente, 'getPosizione')) {
        $pos = $utente->getPosizione();
        $data['posizione'] = ($pos instanceof \InkMaster\Enum\Citta) ? $pos->value : (string)$pos;
        }
        if (method_exists($utente, 'getDescrizione'))$data['descrizione'] = $utente->getDescrizione();
        if (method_exists($utente, 'getPartitaIva')) $data['partita_iva'] = $utente->getPartitaIva();
        if (method_exists($utente, 'getTatuatori'))  $data['tatuatori']   = $utente->getTatuatori();

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
        if (!empty($dati['cognome']) && method_exists($utente, 'setCognome'))
            $utente->setCognome($dati['cognome']);
        if (!empty($dati['email']) && method_exists($utente, 'setEmail'))
            $utente->setEmail($dati['email']);
        if (isset($dati['telefono']) && method_exists($utente, 'setTelefono'))
            $utente->setTelefono($dati['telefono'] ?: null);
        if (isset($dati['descrizione']) && method_exists($utente, 'setDescrizione'))
            $utente->setDescrizione($dati['descrizione'] ?: null);
        if (!empty($dati['posizione']) && method_exists($utente, 'setPosizione')) {
            $citta = \InkMaster\Enum\Citta::tryFrom($dati['posizione']);
            if ($citta !== null) $utente->setPosizione($citta);
        }
        if (!empty($dati['username']) && method_exists($utente, 'setUsername')) {
        $utente->setUsername($dati['username']);
        SessionManager::set('username', $dati['username']);
        }

        $this->pm->update();

        return ['status' => 'success', 'message' => 'Dati aggiornati con successo.'];
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
        $this->pm->update();

        return [
            'status'  => 'success',
            'message' => 'Password aggiornata con successo.',
        ];
    }
}