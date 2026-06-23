<?php 

namespace InkMaster\Control\ControllerCliente;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Foundation\SessionManager;
use InkMaster\Entity\Studio;
use InkMaster\Entity\Tatuatore;
use InkMaster\Entity\Cliente;
use InkMaster\Entity\Recensione;

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

    //Metodo che permette al cliente di compilare i campi del form della recensione
    //e che restituisce un'anteprima della recensione compilata prima di procedere con l'invio
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

    //Metodo che permette al cliente di confermare l'invio della recensione
    //e gli restituisce quindi la pagina dello studio aggiornata con la nuova recensione
   public function pubblicaRecensione(): array
    {
        //Recupero informazioni utili dalla sessione
        $idStudio = SessionManager::get('studio_selezionato');
        $idCliente = SessionManager::get('id_utente');
        $bozza = SessionManager::get('bozza_recensione');

        // Controllo di sicurezza: validità della sessione
        if ($idStudio === null || $idCliente === null || $bozza === null) {
            return [
                'status'  => 'error',
                'message' => 'Nessuna bozza di recensione da pubblicare'
            ];
        }

        //Recupero oggetti usando le CRUD del PersistentManager
        $cliente   = $this->pm->read(Cliente::class, $idCliente);
        $studio    = $this->pm->read(Studio::class, $idStudio);
        $tatuatore = $this->pm->read(Tatuatore::class, $bozza['idTatuatore']);

        //Controllo di integrità referenziale
        if ($cliente === null || $studio === null || $tatuatore === null) {
            return [
                'status'  => 'error',
                'message' => 'Dati non disponibili per la pubblicazione'
            ];
        }

        try {
            // Instanziazione della recensione
            // Passiamo esattamente i 7 parametri obbligatori + i 2 opzionali (descrizione e foto)
            $recensione = new Recensione(
                $bozza['voto'],            // int $voto
                new \DateTime(),           // DateTime $data (imposta la data corrente)
                $cliente,                  // Cliente $cliente
                $studio,                   // Studio $studio
                $bozza['titolo'],          // string $titolo
                $bozza['stile'],           // string $stile
                $tatuatore,                // Tatuatore $tatuatore
                $bozza['descrizione'],     // ?string $descrizione (opzionale)
                $bozza['foto']             // ?string $percorsoFoto (opzionale)
            );

            // Salvataggio tramite la CRUD "create" del PersistentManager
            $this->pm->create($recensione);

            // Rimozione degli stati temporanei del wizard (id_utente NON va rimosso)
            SessionManager::remove('studio_selezionato');
            SessionManager::remove('bozza_recensione');

            // 6. Ritorno dei dati aggiornati per la Presentation
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

        } catch (\Exception $e) {
            return [
                'status'  => 'error',
                'message' => 'Errore critico durante la pubblicazione sul database: ' . $e->getMessage()
            ];
        }
    }


    // Permette di eliminare una recensione dal sistema tramite il suo ID.
    // Sfrutta i metodi CRUD "read" e "delete" generici del PersistentManager.
    public function eliminaRecensione(int $idRecensione): array
    {
        // Recuperiamo l'entità gestita da Doctrine dal DB tramite la CRUD "read"
        $recensione = $this->pm->read(Recensione::class, $idRecensione);

        // Se la recensione non esiste nel DB, restituiamo subito un errore
        if ($recensione === null) {
            return [
                'status'  => 'error',
                'message' => 'Impossibile eliminare: recensione non trovata nel sistema.'
            ];
        }

        try {
            // Utilizziamo il metodo CRUD "delete" passandogli l'oggetto Entity
            $this->pm->delete($recensione);

            // Risposta per la Presentation in caso di successo
            return [
                'status'      => 'success',
                'message'     => 'Recensione eliminata con successo',
                'interfaccia' => 'Bacheca aggiornata senza la recensione eliminata'
            ];

        } catch (\Exception $e) {
            // Gestione di eventuali eccezioni lanciate dal database
            return [
                'status'  => 'error',
                'message' => 'Errore critico durante l\'eliminazione dal database: ' . $e->getMessage()
            ];
        }
    }

    
}