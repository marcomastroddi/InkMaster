<?php
namespace InkMaster\Control\ControllerComune;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Entity\Cliente;
use InkMaster\Entity\Studio;
use InkMaster\Enum\Citta;
use DateTime;

class Registrazione
{
    private PersistentManager $pm;

    public function __construct()
    {
        $this->pm = PersistentManager::getInstance();
    }

    public function registraCliente(array $dati): array
    {
        // 1. Campi obbligatori
        foreach (['nome','cognome','username','password','conferma_password','data_nascita','email'] as $c) {
            if (empty($dati[$c])) {
                return ['status' => 'error', 'message' => "Campo mancante: $c"];
            }
        }

        // 2. Le due password coincidono
        if ($dati['password'] !== $dati['conferma_password']) {
            return ['status' => 'error', 'message' => 'Le password non coincidono'];
        }

        // 3. Username libero ovunque (globale)
        if (!$this->pm->usernameDisponibile($dati['username'])) {
            return ['status' => 'error', 'message' => 'Username già in uso'];
        }

        // 4. Hash della password (coerente con il login: password_verify)
        $hash = password_hash($dati['password'], PASSWORD_BCRYPT);

        // 5. Crea e salva (try/catch intercetta l'email duplicata: vincolo unique del DB)
        try {
            $cliente = new Cliente(
                $dati['nome'],
                $dati['cognome'],
                $hash,
                $dati['username'],
                new DateTime($dati['data_nascita']),
                $dati['email'],
                $dati['posizione'] ?? null
            );
            $this->pm->create($cliente);
        } catch (\Throwable $e) {
            return ['status' => 'error', 'message' => 'Email già registrata o dati non validi'];
        }

        return [
            'status'      => 'success',
            'message'     => 'Registrazione completata',
            'interfaccia' => 'Home',
            'idUtente'    => $cliente->getId(),
        ];
    }

    public function registraStudio(array $dati): array
    {
        // 1. Campi obbligatori
        foreach (['nome','partita_iva','posizione','email','username','password','conferma_password'] as $c) {
            if (empty($dati[$c])) {
                return ['status' => 'error', 'message' => "Campo mancante: $c"];
            }
        }

        // 2. Le due password coincidono
        if ($dati['password'] !== $dati['conferma_password']) {
            return ['status' => 'error', 'message' => 'Le password non coincidono'];
        }

        // 3. Username libero ovunque (globale)
        if (!$this->pm->usernameDisponibile($dati['username'])) {
            return ['status' => 'error', 'message' => 'Username già in uso'];
        }

        // 4. La posizione dello studio è un enum Citta
        $citta = Citta::tryFrom($dati['posizione']);
        if ($citta === null) {
            return ['status' => 'error', 'message' => 'Città non valida'];
        }

        // 5. Hash password
        $hash = password_hash($dati['password'], PASSWORD_BCRYPT);

        // 6. Crea e salva
        try {
            $studio = new Studio(
                $dati['nome'],
                $dati['partita_iva'],
                $citta,
                $dati['email'],
                $dati['username'],
                $hash,
                $dati['descrizione'] ?? null,
                $dati['telefono'] ?? null
            );
            $this->pm->create($studio);
        } catch (\Throwable $e) {
            return ['status' => 'error', 'message' => 'Email/P.IVA già registrata o dati non validi'];
        }

        return [
            'status'      => 'success',
            'message'     => 'Registrazione studio completata, ora puoi accedere',
            'interfaccia' => 'Login',
            'idStudio' => $studio->getId(),
        ];
    }
}