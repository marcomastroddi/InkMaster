<?php 
namespace InkMaster\Control; //namespace per evitare conflitti con altre classi
use InkMaster\Foundation\PersistentManager;
use InkMaster\Foundation\SessionManager;
use InkMaster\Entity\StudioRepository;
class GestionePortfolio {

    private PersistentManager $pm;

    public function __construct()
    {
        $this->pm = PersistentManager::getInstance();
    }

    public function apriPortfolio(): array
    {
        // Recupera l'ID dello studio dalla sessione e non quello del tatuatore
        // Questo perché il portfolio è legato allo studio, non al tatuatore
        //$idStudio = SessionManager::get('id_studio'); 

        $idStudio = 12345; // ID finto per il test

        $nomeStudio = SessionManager::get('nome_studio'); // Recupera anche il nome dello studio per visualizzarlo nel portfolio
        $nomeTatuatore = SessionManager::get('nome_tatuatore'); // Recupera il nome del tatuatore per visualizzarlo nel portfolio

        if(!$idStudio)
        {
            return [
                'status' => 'error',
                'message' => 'Effettua il login per visualizzare il portfolio'
            ];
        }

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
            'nome_studio' => $nomeStudio,
            'nome_tatuatore' => $nomeTatuatore
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

    public function pubblicaTatuaggio(array $datiForm): array
    {
        $idStudio = SessionManager::get('id_studio', 12345); // Recupera l'ID dello studio dalla sessione. Dato che non c'è ancora una sessione attiva, per ora uso un ID fittizio per il test
        $idTatuatore = SessionManager::get('id_tatuatore', 67890); // Recupera l'ID del tatuatore dalla sessione. Dato che non c'è ancora una sessione attiva, per ora uso un ID fittizio per il test

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
        $esitoPubblicazione = $this->pm->savePubblicazione($idStudio, $idTatuatore, $infoPubblicazione);

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


    
}