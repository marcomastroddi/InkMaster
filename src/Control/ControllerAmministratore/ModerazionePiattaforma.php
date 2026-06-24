<?php
namespace InkMaster\Control\ControllerAmministratore;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Foundation\SessionManager;
use InkMaster\Entity\Ban;
use InkMaster\Entity\Cliente;
use InkMaster\Entity\Studio;

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

    public function seleziona_utente(int $utenteId, string $tipo): array
    {
        // Il tipo arriva dalla segnalazione: 'cliente' oppure 'studio'
        $classe = match ($tipo) {
            'cliente' => Cliente::class,
            'studio'  => Studio::class,
            default   => null,
        };

        if ($classe === null) {
            return ['status' => 'error', 'message' => 'Tipo utente non valido'];
        }

        $utente = $this->pm->read($classe, $utenteId);

        if ($utente === null) {
            return ['status' => 'error', 'message' => 'Utente non trovato'];
        }

        // Salviamo SIA l'id SIA il tipo: serviranno a conferma_ban
        SessionManager::set('utente_selezionato', $utenteId);
        SessionManager::set('tipo_utente_selezionato', $tipo);

        return [
            'status'      => 'success',
            'interfaccia' => 'Profilo utente',
            'data'        => $utente
        ];
    }

    public function conferma_ban(string $tipo, string $durata, string $motivazione, string $gravita, string $descrizione): array
    {
        $utenteId   = SessionManager::get('utente_selezionato');
        // Per ora 'cliente' (tappabuchi del #1); diventerà il tipo vero quando risolviamo seleziona_utente
        $utenteTipo = SessionManager::get('tipo_utente_selezionato', 'cliente');

        if ($utenteId === null) {
            return ['status' => 'error', 'message' => 'Nessun utente selezionato'];
        }

        $ban = new Ban($utenteId, $utenteTipo, $tipo, $durata, $motivazione, $gravita, $descrizione);
        $this->pm->create($ban);

        return [
            'status'      => 'success',
            'interfaccia' => 'Ban confermato',
            'data'        => [
                'ban_id'      => $ban->getId(),
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