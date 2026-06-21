<?php

namespace InkMaster\Control;

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
        $idMittente = SessionManager::get('id_utente');

        if (!$ruoloMittente) {
            return ['status' => 'error', 'message' => 'Devi essere loggato.'];
        }

        $nomeTarget = 'Sconosciuto';
        if ($tipoTarget === 'studio') {
            $studio = $this->pm->find(Studio::class, $idTarget);
            if ($studio) $nomeTarget = $studio->getNome();
        } elseif ($tipoTarget === 'cliente') {
            $cliente = $this->pm->find(Cliente::class, $idTarget);
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

        if (!$ruoloMittente) {
            return ['status' => 'error', 'message' => 'Devi essere loggato.'];
        }

        $segnalazione = new Segnalazione($motivo, $descrizione, new DateTime());

        if ($ruoloMittente === 'cliente') {
            $mittente = $this->pm->find(Cliente::class, $idMittente);
            if ($mittente) $segnalazione->setCliente($mittente);
        } elseif ($ruoloMittente === 'studio' || $ruoloMittente === 'tatuatore') {
            $mittente = $this->pm->find(Studio::class, $idMittente);
            if ($mittente) $segnalazione->setStudio($mittente);
        }

        $esito = $this->pm->saveSegnalazione($segnalazione);

        if (!$esito) {
            return ['status' => 'error', 'message' => 'Impossibile inviare la segnalazione.'];
        }

        return [
            'status'      => 'success',
            'message'     => 'Segnalazione inviata con successo.',
            'interfaccia' => 'Home'
        ];
    }
}