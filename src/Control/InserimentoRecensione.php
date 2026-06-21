<?php 
namespace InkMaster\Control;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Foundation\SessionManager;
use InkMaster\Entity\Studio;

class InserimentoRecensione {
    private PersistentManager $pm;

    public function __construct()
    {
        $this->pm = PersistentManager::getInstance();
    }

    public function avvia_recensione(int $idStudio, int $idCliente): array
    {
        SessionManager::set('studio_selezionato', $idStudio);
        SessionManager::set('cliente_loggato', $idCliente);

        $studio = $this->pm->find(Studio::class, $idStudio);

        if ($studio === null) {
            return [
                'status'  => 'error',
                'message' => 'Studio non trovato'
            ];
        }

        $tatuatori = $this->pm->findTatuatoriByStudioId($idStudio);
        $stili = $this->pm->findStiliByStudioId($idStudio);

        return [
            'status'      => 'success',
            'interfaccia' => 'Form inserimento recensione',
            'data'        => [
                'studio'    => $studio,
                'tatuatori' => $tatuatori,
                'stili'     => $stili
            ]
        ];
    }

    public function compila_recensione(int $voto, string $titolo, string $descrizione, string $foto, int $idTatuatore, string $stile): array
    {
        $idStudio = SessionManager::get('studio_selezionato');

        if ($idStudio === null) {
            return [
                'status'  => 'error',
                'message' => 'Nessuno studio selezionato'
            ];
        }

        $tatuatore = $this->pm->findTatuatoreById($idTatuatore);

        if ($tatuatore === null) {
            return [
                'status'  => 'error',
                'message' => 'Tatuatore non trovato'
            ];
        }

        $bozza = [
            'voto'         => $voto,
            'titolo'       => $titolo,
            'descrizione'  => $descrizione,
            'foto'         => $foto,
            'idTatuatore'  => $idTatuatore,
            'stile'        => $stile
        ];

        SessionManager::set('bozza_recensione', $bozza);

        return [
            'status'      => 'success',
            'interfaccia' => 'Anteprima recensione',
            'data'        => [
                'voto'        => $voto,
                'titolo'      => $titolo,
                'descrizione' => $descrizione,
                'foto'        => $foto,
                'tatuatore'   => $tatuatore->getNome() . ' ' . $tatuatore->getCognome(),
                'stile'       => $stile
            ]
        ];
    }

   public function pubblica_recensione(): array
    {
        $idStudio = SessionManager::get('studio_selezionato');
        $idCliente = SessionManager::get('cliente_loggato');
        $bozza = SessionManager::get('bozza_recensione');

        if ($idStudio === null || $idCliente === null || $bozza === null) {
            return [
                'status'  => 'error',
                'message' => 'Nessuna bozza di recensione da pubblicare'
            ];
        }

        $cliente = $this->pm->findPersonaById($idCliente);
        $studio = $this->pm->find(Studio::class, $idStudio);
        $tatuatore = $this->pm->findTatuatoreById($bozza['idTatuatore']);

        if ($cliente === null || $studio === null || $tatuatore === null) {
            return [
                'status'  => 'error',
                'message' => 'Dati non disponibili per la pubblicazione'
            ];
        }

        $recensione = $this->pm->salvaRecensione(
            $bozza['voto'],
            $bozza['titolo'],
            $bozza['descrizione'],
            $bozza['foto'],
            $bozza['stile'],
            $cliente,
            $studio,
            $tatuatore
        );

        SessionManager::remove('studio_selezionato');
        SessionManager::remove('cliente_loggato');
        SessionManager::remove('bozza_recensione');

        return [
            'status'      => 'success',
            'interfaccia' => 'Bacheca aggiornata e notifica studio',
            'data'        => [
                'voto'        => $recensione->getVoto(),
                'titolo'      => $recensione->getTitolo(),
                'descrizione' => $recensione->getDescrizione(),
                'foto'        => $recensione->getFoto(),
                'tatuatore'   => $tatuatore->getNome() . ' ' . $tatuatore->getCognome(),
                'stile'       => $recensione->getStile(),
                'idStudio'    => $idStudio
            ]
        ];
    }
}