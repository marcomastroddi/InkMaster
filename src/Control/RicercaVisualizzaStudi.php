<?php
namespace InkMaster\Control;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Enum\Citta;
use InkMaster\Foundation\SessionManager;
use InkMaster\Entity\Studio;


class RicercaVisualizzaStudi
{
    private PersistentManager $pm;

    public function __construct()
    {
        $this->pm = PersistentManager::getInstance();
    }

    public function mostra_home(): array
    {
        $cittaDefault = 'Roma';

        $recensioni = $this->pm->findRecensioniPositiveRandom(5);
        $studi      = $this->pm->findStudiRandom(5);

        return [
            'status'         => 'success',
            'interfaccia'    => 'Home Page Iniziale',
            'citta_corrente' => $cittaDefault,
            'recensioni'     => $recensioni,
            'studi'          => $studi
        ];
    }

    public function scegli_citta(): array
        {
            $cittaEnum = Citta::cases();
            $cittaDisponibili = array_map(fn($citta) => $citta->value, $cittaEnum);

            return [
                'status' => 'success',
                'interfaccia' => 'Menù città dinamico',
                'data' => $cittaDisponibili
            ];
        }
    
    public function seleziona_posizione(string $citta): array
    {
        $cittaEnum = Citta::tryFrom($citta);

        if ($cittaEnum === null) {
            return ['status' => 'error', 'message' => 'Città non valida'];
        }

        $filtri = SessionManager::get('filtri_ricerca', []);
        $filtri['citta'] = $cittaEnum->value; // o anche $cittaEnum, vedi sotto
        SessionManager::set('filtri_ricerca', $filtri);

        return [
            'status' => 'success',
            'interfaccia' => 'Catch phrase aggiornata',
            'catch_phrase' => "I migliori tatuatori a " . $cittaEnum->value
        ];
    }

    public function apri_stili_disponibili(): array
    {
        $stili = $this->pm->findAvailableStyles();

        return [
            'status' => 'success',
            'interfaccia' => 'sezione "TatooStyles"',
            'data' => $stili
        ];
    }

    public function seleziona_stile(string $stile): array
    {
        $filtri = SessionManager::get('filtri_ricerca', []);
        $filtri['stile'] = $stile;
        SessionManager::set('filtri_ricerca', $filtri);

        return [
            'status' => 'success',
            'interfaccia' => 'Home page filtri aggiornati'
        ];
    }

    public function inserisci_testo_ricerca(string $testo): array
    {
        $filtri = SessionManager::get('filtri_ricerca', []);
        $filtri['testo'] = $testo;
        SessionManager::set('filtri_ricerca', $filtri);

        return [
            'status' => 'success',
            'interfaccia' => 'Home page filtri aggiornati',
            'data' => $testo
        ];
    }


    // Funzione privata per preparare i criteri di ricerca in base ai parametri forniti
    //metdo da usare con avvia_ricerca per determinare i criteri di ricerca in base ai parametri forniti (città, stile e testo). Restituisce un array con i criteri di ricerca.
    private function prepara_criteri_ricerca(string $citta, string $stile, string $testo): array
    {
        // priorità 1: se c'è testo, vince su tutto il resto
        if (!empty($testo)) {
            return [
                'tipo'  => 'testo',
                'testo' => $testo
            ];
        }

        // priorità 2: nessun testo -> usiamo città + eventuale stile
        return [
            'tipo'  => 'posizione',
            'citta' => $citta,
            'stile' => $stile !== '' ? $stile : null
        ];
    }

    public function avvia_ricerca(): array
    {
        $citta = SessionManager::get('citta', 'Roma'); // c'è sempre un default
        $stile = SessionManager::get('stile', '');
        $testo = SessionManager::get('testo', '');

        $criteri = $this->prepara_criteri_ricerca($citta, $stile, $testo);

        $tatuatori = $this->pm->findAvailableStudios($criteri);

        return [
            'status'      => 'success',
            'interfaccia' => 'Lista tatuatori',
            'data'        => $tatuatori
        ];
    }

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
    
    public function visualizza_recensioni(int $studioId): array
    {
        $recensioni = $this->pm->findRecensioniByStudioId($studioId);

        return [
            'status'      => 'success',
            'interfaccia' => 'Lista recensioni studio',
            'data'        => $recensioni
        ];
    }

}
