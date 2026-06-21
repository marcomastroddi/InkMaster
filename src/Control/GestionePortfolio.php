<?php 
namespace InkMaster\Control; //namespace per evitare conflitti con altre classi
use InkMaster\Foundation\PersistentManager;
use InkMaster\Foundation\SessionManager;
use InkMaster\Entity\Studio;

class GestionePortfolio {

    private PersistentManager $pm;

    public function __construct()
    {
        $this->pm = PersistentManager::getInstance();
    }

    public function apriPortfolio(): array
    {
        // Il portfolio è legato allo studio loggato, non al singolo tatuatore
        $idStudio = SessionManager::get('id_studio', 1); // 1 fittizio per il test

        if(!$idStudio)
        {
            return [
                'status' => 'error',
                'message' => 'Effettua il login per visualizzare il portfolio'
            ];
        }

        // Il nome dello studio si ricava dall'entità, non da una chiave di sessione
        $studio = $this->pm->find(Studio::class, $idStudio);
        $portfolio = $this->pm->findPortfolioByStudioId($idStudio);

        /**
         * Attenzione: il controllo qui sotto non è necessario perché la funzione findPortfolioByStudioId
         * restituisce sempre un array di pubblicazioni, anche se vuoto. Nel caso in cui sia vuoto non si
         * visualizza un messaggio di errore, ma semplicemente si mostra un portfolio vuoto.
        *if ($portfolio === null) {
            *return ['status' => 'error', 'message' => 'Portfolio non trovato'];
        *}
         */

        return [
            'status' => 'success',
            'data' => $portfolio,
            'nome_studio' => $studio ? $studio->getNome() : null
        ];
    }

    public function mostraFormPubblicazione(): array
    {
        $stili = $this->pm->findAvailableStyles();

        return [
            'status' => 'success',
            'Inserisci titolo' => 'Inserisci titolo',
            'Inserisci descrizione' => 'Inserisci descrizione',
            'Inserisci foto' => 'Inserisci foto',
            'data' => $stili
        ];
    }

    public function pubblicaPubblicazione(array $datiForm): array
    {
        $idStudio = SessionManager::get('id_studio', 1); // 1 fittizio per il test

        // Generiamo in automatico data e ora correnti
        $dataCorrente = new \DateTime();
        $oraCorrente = new \DateTime();

        // Impacchettiamo tutto il pacchetto di informazioni da dare al Foundation
        $infoPubblicazione = [
        'titolo'        => $datiForm['titolo'] ?? 'Senza Titolo',
        'descrizione'   => $datiForm['descrizione'] ?? 'Senza Descrizione',
        'percorso_foto' => $datiForm['percorso_foto'] ?? 'Senza Foto',
        'stile_scelto'  => $datiForm['stile'], 
        'data'          => $dataCorrente,
        'ora'           => $oraCorrente
        ];

        // Chiamata al Foundation per salvare la pubblicazione nel database grazie al metodo savePubblicazione()
        $esitoPubblicazione = $this->pm->savePubblicazione($idStudio, $infoPubblicazione);

        if ($esitoPubblicazione) {
        return [
            'status' => 'success',
            'message' => 'Tatuaggio pubblicato con successo nel portfolio dello studio!',
            'interfaccia' => 'Visualizzazione Portfolio Studio aggiornato con la nuova pubblicazione',
        ];
        }

        return [
            'status' => 'error',
            'message' => 'Impossibile pubblicare il tatuaggio.'
        ];

    }

    public function eliminaPubblicazione(int $idPubblicazione): array
    {
        $esitoEliminazione = $this->pm->deletePubblicazione($idPubblicazione);

        if ($esitoEliminazione) {
            return [
                'status' => 'success',
                'message' => 'Pubblicazione eliminata con successo dal portfolio dello studio',
                'interfaccia' => 'Visualizzazione Portfolio Studio aggiornato senza la pubblicazione eliminata',
            ];
        }

        return [
            'status' => 'error',
            'message' => 'Impossibile eliminare la pubblicazione.'
        ];
    }


    
}