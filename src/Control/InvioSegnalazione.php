<?php

namespace InkMaster\Control;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Foundation\SessionManager;

use InkMaster\Entity\Cliente;
use InkMaster\Entity\Studio;

use InkMaster\Foundation\Repository\ClienteRepository;
use InkMaster\Foundation\Repository\StudioRepository;

class InvioSegnalazione
{

    private PersistentManager $pm;

    public function __construct()
    {
        $this->pm = PersistentManager::getInstance();
    }

    // Questo metodo apre il form di segnalazione
    // $tipoTarget può essere cliente o studio, $idTarget è l'id del cliente o dello studio da segnalare
    public function apriFormSegnalazione(string $tipoTarget, int $idTarget): array
    {
        $ruoloMittente = SessionManager::get('ruolo');
        $idMittente = SessionManager::get('id_utente');

        if (!$ruoloMittente) {
            return ['status' => 'error', 'message' => 'Devi essere loggato.'];
        }

        // Recuperiamo il nome del target per mostrarlo nel form ("Stai segnalando...")
        $nomeTarget = 'Sconosciuto';
        if ($tipoTarget === 'studio') {
            $studio = $this->pm->findById($idTarget);
            if ($studio) $nomeTarget = $studio->getNome();
        } elseif ($tipoTarget === 'cliente') {
            $cliente = $this->pm->findById($idTarget);
            if ($cliente) $nomeTarget = $cliente->getNome();
        }

    // I motivi predefiniti che andranno a riempire l'attributo $motivo della classe Segnalazione
    $opzioniMotivo = [
        'Contenuto Inappropriato',
        'Spam o Truffa',
        'Comportamento Scorretto',
        'Mancata Presentazione (No-Show)'
    ];

    // Il RETURN mappato sugli attributi reali della classe Segnalazione
    return [
        'status' => 'success',
        'data' => [
            // Informazioni sul mittente (serviranno per impostare $this->cliente o $this->studio nell'entità)
            'mittente' => [
                'id' => $idMittente,
                'ruolo' => $ruoloMittente // ci dice se valorizzare l'attributo ?Cliente o ?Studio
            ],
            // Informazioni sul destinatario/target della segnalazione
            'target' => [
                'id' => $idTarget,
                'tipo' => $tipoTarget, // 'studio' o 'cliente'
                'nome' => $nomeTarget
            ],
            // Campi pronti per popolare gli attributi diretti di Segnalazione
            'form_campi' => [
                'motivo' => $opzioniMotivo, // Popolerà l'attributo string $motivo
                'stato_iniziale' => 'APERTA', // Rispecchia l'attributo string $stato = 'APERTA'
                'data_creazione' => date('Y-m-d') // Rispecchia l'attributo DateTime $data
            ]
        ]
    ];
    
    }
}
