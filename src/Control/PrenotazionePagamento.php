<?php 
namespace InkMaster\Control;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Entity\Studio;
use InkMaster\Entity\Tatuatore;
use InkMaster\Entity\Stile;
use InkMaster\Entity\Cliente;
use InkMaster\Entity\Appuntamento;
use DateTime;

class PrenotazionePagamento {

    private PersistentManager $pm;

    public function __construct()
    {
        $this->pm = PersistentManager::getInstance();
    }

    // ── Step 0: l'utente apre la pagina dello studio ─────────────
    public function scegli_studio(int $studioId): array
    {
        $studio = $this->pm->find(Studio::class, $studioId);

        if ($studio === null) {
            return ['status' => 'error', 'message' => 'Studio non trovato'];
        }

        // Salviamo l'id dello studio: ci servirà alla fine per creare l'appuntamento
        $_SESSION['prenotazione']['studio_id'] = $studioId;

        return [
            'status' => 'success',
            'interfaccia' => 'Interfaccia studio',
            'data' => $studio
        ];
    }

    // ── Step 1: l'utente clicca "Avanti" dopo aver scelto un tatuatore ──
    public function scegli_tatuatore(int $tatuatoreId): array
    {
        $tatuatore = $this->pm->find(Tatuatore::class, $tatuatoreId);

        if ($tatuatore === null) {
            return ['status' => 'error', 'message' => 'Tatuatore non trovato'];
        }

        // Controllo di coerenza: il tatuatore deve appartenere allo studio scelto allo step 0
        $studioId = $_SESSION['prenotazione']['studio_id'] ?? null;
        if ($tatuatore->getStudio()->getId() !== $studioId) {
            return ['status' => 'error', 'message' => 'Tatuatore non valido per questo studio'];
        }

        $_SESSION['prenotazione']['tatuatore_id'] = $tatuatoreId;

        return [
            'status' => 'success',
            'interfaccia' => 'Scelta stile',
            // Passiamo SOLO gli stili di QUESTO tatuatore, per popolare lo step successivo
            'data' => $tatuatore->getStili()
        ];
    }

    // ── Step 2: l'utente clicca "Avanti" dopo aver scelto uno stile ──
    public function scegli_stile(int $stileId): array
    {
        $stile = $this->pm->find(Stile::class, $stileId);

        if ($stile === null) {
            return ['status' => 'error', 'message' => 'Stile non trovato'];
        }

        $_SESSION['prenotazione']['stile_id'] = $stileId;

        return [
            'status' => 'success',
            'interfaccia' => 'Scelta data'
            // Nota: per ora il calendario può mostrare semplicemente i giorni futuri.
            // In futuro qui si potrebbe calcolare la vera disponibilità del tatuatore.
        ];
    }

    // ── Step 3: l'utente clicca "Avanti" dopo aver scelto la data ──
    public function scegli_data(string $data): array
    {
        $dataValida = DateTime::createFromFormat('Y-m-d', $data);

        if ($dataValida === false) {
            return ['status' => 'error', 'message' => 'Data non valida'];
        }

        $_SESSION['prenotazione']['data'] = $data;

        return [
            'status' => 'success',
            'interfaccia' => 'Descrivi la tua idea'
        ];
    }

    // ── Step 4: l'utente scrive l'idea e clicca "Conferma" ──────
    public function richiedi_appuntamento(int $clienteId, string $descrizione): array
    {
        $prenotazione = $_SESSION['prenotazione'] ?? [];

        // Controllo difensivo: l'utente deve aver completato tutti gli step precedenti
        if (
            empty($prenotazione['studio_id']) ||
            empty($prenotazione['tatuatore_id']) ||
            empty($prenotazione['stile_id']) ||
            empty($prenotazione['data'])
        ) {
            return ['status' => 'error', 'message' => 'Prenotazione incompleta'];
        }

        $studio     = $this->pm->find(Studio::class, $prenotazione['studio_id']);
        $tatuatore  = $this->pm->find(Tatuatore::class, $prenotazione['tatuatore_id']);
        $stile      = $this->pm->find(Stile::class, $prenotazione['stile_id']);

        // TODO: quando ci sarà il login, $clienteId arriverà dalla sessione utente,
        // non da un parametro passato dal form.
        $cliente = $this->pm->find(Cliente::class, $clienteId);

        if ($studio === null || $tatuatore === null || $stile === null || $cliente === null) {
            return ['status' => 'error', 'message' => 'Dati prenotazione non validi'];
        }

        // Orario fisso di default — da migliorare con una scelta reale dell'utente
        $oraInizio = DateTime::createFromFormat('H:i', '10:00');
        $oraFine   = DateTime::createFromFormat('H:i', '11:00');

        $appuntamento = new Appuntamento(
            data: new DateTime($prenotazione['data']),
            oraInizio: $oraInizio,
            oraFine: $oraFine,
            stato: 'IN_ATTESA',
            cliente: $cliente,
            studio: $studio,
            tatuatore: $tatuatore,
            note: 'Stile richiesto: ' . $stile->getNome() . ' — Idea: ' . $descrizione
        );

        $this->pm->save($appuntamento);

        // La prenotazione è completata: puliamo la sessione
        unset($_SESSION['prenotazione']);

        return [
            'status' => 'success',
            'interfaccia' => 'Conferma prenotazione',
            'message' => 'Appuntamento richiesto con successo'
        ];
    }
}