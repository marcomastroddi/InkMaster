<?php 

namespace InkMaster\Control\ControllerComune;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Foundation\SessionManager;
use InkMaster\Entity\Studio;
use InkMaster\Entity\Tatuatore;

class GestioneRecensione {
    private PersistentManager $pm;

    public function __construct()
    {
        $this->pm = PersistentManager::getInstance();
    }

    //Metodo che mostra al cliente il form per l'inserimento della recensione,
    //recupera dal db i tatuatori e gli stili così da mostrarli nel form
    public function mostraFormRecensione(int $idStudio): array
    {
        // Il cliente è chi è loggato: lo studio selezionato è uno stato temporaneo del wizard (???)
        SessionManager::set('studio_selezionato', $idStudio);

        //Grazie al metodo CRUD "read" recupero l'oggetto Studio
        $studio = $this->pm->read(Studio::class, $idStudio);

        if ($studio === null) 
        {
            return 
            [
                'status'  => 'error',
                'message' => 'Studio non trovato'
            ];
        }

        $tatuatori = $this->pm->findTatuatoriByStudioId($idStudio);
        $stili = $this->pm->findStiliByStudioId($idStudio);

        // NOTA: L'ID dello studio dovrà essere inserito in un <input type="hidden"> nel form HTML. (???)
        //Restituiamo i dati a Presentation
        return 
        [
            'status'      => 'success',
            'interfaccia' => 'Form inserimento recensione',
            'data'        => [
                'studio'    => $studio,
                'tatuatori' => $tatuatori,
                'stili'     => $stili
            ]
        ];
    }

    public function compilaRecensione(int $voto, string $titolo, ?string $descrizione, ?string $foto, int $idTatuatore, string $stile): array
    {
        $idStudio = SessionManager::get('studio_selezionato'); //recuperiamo l'id dello studio dalla sessione inizializzata in mostrFormRecensione

        if ($idStudio === null) {
            return [
                'status'  => 'error',
                'message' => 'Nessuno studio selezionato'
            ];
        }

        //Grazie al metodo CRUD "read" recuero l'oggetto tatuatore
        $tatuatore = $this->pm->read(Tatuatore::class, $idTatuatore);

        if ($tatuatore === null) {
            return [
                'status'  => 'error',
                'message' => 'Tatuatore non trovato'
            ];
        }

        // --- GESTIONE CAMPI OPZIONALI ---
        
        // Se la descrizione è vuota, salviamo null, altrimenti teniamo il testo inserito
        $testoDescrizione = !empty($descrizione) ? $descrizione : null;

        // Se la foto è vuota, salviamo null, altrimenti teniamo il percorso
        $percorsoFoto = !empty($foto) ? $foto : null;

        $bozza = [
            'voto'         => $voto,
            'titolo'       => $titolo,
            'descrizione'  => $testoDescrizione,
            'foto'         => $percorsoFoto,
            'idTatuatore'  => $idTatuatore,
            'stile'        => $stile
        ];

        //Grazie a SessionManager "congeliamo" i dati inseriti nella recensione per
        //poi recuperarli in pubblicaRecensione, in cui li usiamo per inserire la recensione nel Db
        SessionManager::set('bozza_recensione', $bozza);

        return [
            'status'      => 'success',
            'interfaccia' => 'Anteprima recensione',
            'data'        => [
                'voto'        => $voto,
                'titolo'      => $titolo,
                'descrizione' => $testoDescrizione,
                'foto'        => $percorsoFoto,
                'tatuatore'   => $tatuatore->getNome() . ' ' . $tatuatore->getCognome(),
                'stile'       => $stile
            ]
        ];
    }

   public function pubblicaRecensione(): array
    {
        $idStudio = SessionManager::get('studio_selezionato');
        $idCliente = SessionManager::get('id_utente');
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

        // Rimuoviamo solo gli stati temporanei del wizard: id_utente è identità, NON va toccato
        SessionManager::remove('studio_selezionato');
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

    public function eliminaRecensione(int $idRecensione): array
    {
        $esitoEliminazione = $this->pm->deleteRecensione($idRecensione);

        if ($esitoEliminazione) {
            return [
                'status' => 'success',
                'message' => 'Recensione eliminata con successo',
                'interfaccia' => 'Bacheca aggiornata senza la recensione eliminata'
            ];
        }

        return [
            'status' => 'error',
            'message' => 'Impossibile eliminare la recensione.'
        ];

    }

    
}