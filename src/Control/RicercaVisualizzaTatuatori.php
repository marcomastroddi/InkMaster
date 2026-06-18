<?php
namespace InkMaster\Control;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Enum\Citta;
use InkMaster\Foundation\SessionManager;

class RicercaVisualizzaTatuatori
{
    private PersistentManager $pm;

    public function __construct()
    {
        $this->pm = PersistentManager::getInstance();
    }

    public function mostra_home(): array
        {
            $stiliTatuaggi = $this->pm->findAvailableStyles();

            $cittaDefault = 'Roma';

            $recensioneInEvidenza = [
                'utente' => 'Lorenzo Rossi',
                'intestazione' => 'Lavoro spettacolare!',
                'descrizione' => 'Il tatuatore ha capito al volo la mia idea. Linee sottilissime.',
                'foto_tatuaggio' => 'https://placehold.co/120x150?text=Tatuaggio',
                'nome_tatuatore' => 'DanInk'
            ];

        return [
            'status' => 'success',
            'interfaccia' => 'Home Page Iniziale',
            'stili' => $stiliTatuaggi,
            'citta_corrente' => $cittaDefault,
            'recensione' => $recensioneInEvidenza,
            'tatuatori' => []
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

}
