<?php

namespace InkMaster\Control\ControllerComune;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Foundation\SessionManager;
use InkMaster\Entity\Segnalazione;
use InkMaster\Entity\Cliente;
use InkMaster\Entity\Studio;
use DateTime;

class GestioneSegnalazione
{
    private PersistentManager $pm;

    public function __construct()
    {
        $this->pm = PersistentManager::getInstance();
    }

    public function apriFormSegnalazione(string $tipoTarget, int $idTarget): array
    {
        $ruoloMittente = SessionManager::get('ruolo');
        $idMittente = SessionManager::get('idUtente');

        if (!$ruoloMittente) {
            return ['status' => 'error', 'message' => 'Devi essere loggato.'];
        }

        $nomeTarget = 'Sconosciuto';
        if ($tipoTarget === 'studio') {
            $studio = $this->pm->read(Studio::class, $idTarget);
            if ($studio) $nomeTarget = $studio->getNome();
        } elseif ($tipoTarget === 'cliente') {
            $cliente = $this->pm->read(Cliente::class, $idTarget);
            if ($cliente) $nomeTarget = $cliente->getNome();
        }

        $opzioniMotivo = [
            'Contenuto Inappropriato',
            'Spam o Truffa',
            'Comportamento Scorretto',
            'Mancata Presentazione (No-Show)'
        ];

        return [
            'status' => 'success',
            'data' => [
                'mittente' => [
                    'id'    => $idMittente,
                    'ruolo' => $ruoloMittente
                ],
                'target' => [
                    'id'   => $idTarget,
                    'tipo' => $tipoTarget,
                    'nome' => $nomeTarget
                ],
                'form_campi' => [
                    'motivo'         => $opzioniMotivo,
                    'stato_iniziale' => 'APERTA',
                    'data_creazione' => date('Y-m-d')
                ]
            ]
        ];
    }

    public function inviaSegnalazione(string $motivo, string $descrizione, string $tipoTarget, int $idTarget): array
    {
        $ruoloMittente = SessionManager::get('ruolo');
        $idMittente    = SessionManager::get('id_utente', 1);

        if (!$ruoloMittente || !$idMittente) {
            return ['status' => 'error', 'message' => 'Devi essere loggato.'];
        }

        try {
        // Creazione dell'oggetto Segnalazione con la data in tempo reale (new DateTime())
        $segnalazione = new Segnalazione($motivo, $descrizione, new DateTime());
        
        // Associazione dinamica del Mittente (Chi sta segnalando)
        if ($ruoloMittente === 'cliente') {
            // Usiamo il read generico del PersistentManager per caricare l'entità Cliente
            $mittente = $this->pm->read(Cliente::class, $idMittente);
            if ($mittente) {
                $segnalazione->setCliente($mittente);
            } else {
                return ['status' => 'error', 'message' => 'Cliente mittente non trovato.'];
            }
        } elseif ($ruoloMittente === 'studio' || $ruoloMittente === 'tatuatore') {
            // Usiamo il read generico per caricare lo Studio
            $mittente = $this->pm->read(Studio::class, $idMittente);
            if ($mittente) {
                $segnalazione->setStudio($mittente);
            } else {
                return ['status' => 'error', 'message' => 'Studio mittente non trovato.'];
            }
        }

        // CRUD Create: usiamo il metodo generico del PersistentManager
        $this->pm->create($segnalazione);

        return [
            'status'      => 'success',
            'message'     => 'Segnalazione inviata con successo.',
            'interfaccia' => 'Home'
        ];

    } catch (\Exception $e) {
        // Se Doctrine fallisce (es. vincoli di database violati), intercettiamo l'errore senza crashare
        return [
            'status'  => 'error', 
            'message' => 'Impossibile inviare la segnalazione: ' . $e->getMessage()
        ];
        }
    }

}