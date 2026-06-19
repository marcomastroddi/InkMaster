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

    public function avvia_recensione(int $idStudio): array
    {
        SessionManager::set('studio_selezionato', $idStudio);

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
        $bozza = SessionManager::get('bozza_recensione');

        if ($idStudio === null || $bozza === null) {
            return [
                'status'  => 'error',
                'message' => 'Nessuna bozza di recensione da pubblicare'
            ];
        }

        $tatuatore = $this->pm->findTatuatoreById($bozza['idTatuatore']);

        SessionManager::remove('studio_selezionato');
        SessionManager::remove('bozza_recensione');

        return [
            'status'      => 'success',
            'interfaccia' => 'Bacheca aggiornata e notifica studio',
            'data'        => [
                'voto'        => $bozza['voto'],
                'titolo'      => $bozza['titolo'],
                'descrizione' => $bozza['descrizione'],
                'foto'        => $bozza['foto'],
                'tatuatore'   => $tatuatore !== null ? $tatuatore->getNome() . ' ' . $tatuatore->getCognome() : 'N/D',
                'stile'       => $bozza['stile'],
                'idStudio'    => $idStudio
            ]
        ];
    }
}