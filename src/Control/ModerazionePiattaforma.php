<?php
namespace InkMaster\Control;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Foundation\SessionManager;

class ModerazionePiattaforma
{
    private PersistentManager $pm;

    public function __construct()
    {
        $this->pm = PersistentManager::getInstance();
    }

    public function accedi_segnalazioni(): array
    {
        $segnalazioni = $this->pm->findAllSegnalazioni();

        return [
            'status'      => 'success',
            'interfaccia' => 'Lista segnalazioni',
            'data'        => $segnalazioni
        ];
    }

    public function seleziona_utente(int $utenteId): array
    {
        $utente = $this->pm->findPersonaById($utenteId);

        if ($utente === null) {
            return [
                'status'  => 'error',
                'message' => 'Utente non trovato'
            ];
        }

        SessionManager::set('utente_selezionato', $utenteId);

        return [
            'status'      => 'success',
            'interfaccia' => 'Profilo utente',
            'data'        => $utente
        ];
    }

    public function conferma_ban(string $tipo, string $durata, string $motivazione, string $gravita, string $descrizione): array
    { //va aggiunto un discorso sul db, per ora non serve perché non c'è niente da salvare. Quando ci sarà il db, aggiungeremo un metodo save() in PersistentManager e lo chiameremo qui.
        $utenteId = SessionManager::get('utente_selezionato');

        if ($utenteId === null) {
            return ['status' => 'error', 'message' => 'Nessun utente selezionato'];
        }

        // da implementare con il db
        return [
            'status'      => 'success',
            'interfaccia' => 'Ban confermato',
            'data'        => [
                'utente_id'   => $utenteId,
                'tipo'        => $tipo,
                'durata'      => $durata,
                'motivazione' => $motivazione,
                'gravita'     => $gravita,
                'descrizione' => $descrizione
            ]
        ];
    }

    public function visualizzaDashboard(): array
    {
        $totaleClienti      = $this->pm->countClienti();
        $totaleStudi        = $this->pm->countStudi();
        $segnalazioniAperte = $this->pm->countSegnalazioniAperte();
        $prenotazioniAttive = $this->pm->countPrenotazioniAttive();

        $totaleUtenti = $totaleClienti + $totaleStudi;
        $percentualeClienti = $totaleUtenti > 0 ? round(($totaleClienti / $totaleUtenti) * 100) : 0;
        $percentualeStudi   = $totaleUtenti > 0 ? round(($totaleStudi   / $totaleUtenti) * 100) : 0;

        return [
            'status' => 'success',
            'data'   => [
                'kpi' => [
                    'utenti_registrati'  => $totaleClienti,
                    'studi_registrati'   => $totaleStudi,
                    'segnalazioni_aperte'=> $segnalazioniAperte,
                    'prenotazioni_attive'=> $prenotazioniAttive
                ],
                'tipo_utenti' => [
                    'clienti_percentuale' => $percentualeClienti,
                    'studi_percentuale'   => $percentualeStudi
                ]
            ]
        ];
    }

}