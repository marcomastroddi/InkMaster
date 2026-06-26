<?php 
namespace InkMaster\Control\ControllerCliente;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Foundation\SessionManager;
use InkMaster\Entity\Studio;
use InkMaster\Entity\Tatuatore;
use InkMaster\Entity\Stile;
use InkMaster\Entity\Cliente;
use InkMaster\Entity\Appuntamento;
use InkMaster\Entity\CartaDiCredito;
use InkMaster\Entity\Pagamento;
use DateTime;

class PrenotazionePagamento {

    private PersistentManager $pm;

    public function __construct()
    {
        $this->pm = PersistentManager::getInstance();
    }

    // ── Step 1: l'utente clicca "Avanti" dopo aver scelto un tatuatore ──
    public function scegli_tatuatore(int $tatuatoreId): array
    {
        $tatuatore = $this->pm->read(Tatuatore::class, $tatuatoreId);

        if ($tatuatore === null) {
            return ['status' => 'error', 'message' => 'Tatuatore non trovato'];
        }

        $prenotazione = SessionManager::get('prenotazione', []);

        // Controllo di coerenza: il tatuatore deve appartenere allo studio scelto allo step 0
        $studioId = $prenotazione['studio_id'] ?? null;
        if  ($tatuatore->getStudio()->getId() !== (int)$studioId){
            return ['status' => 'error', 'message' => 'Tatuatore non valido per questo studio'];
        }

        $prenotazione['tatuatore_id'] = $tatuatoreId;
        SessionManager::set('prenotazione', $prenotazione);

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
        $stile = $this->pm->read(Stile::class, $stileId);

        if ($stile === null) {
            return ['status' => 'error', 'message' => 'Stile non trovato'];
        }

        $prenotazione = SessionManager::get('prenotazione', []);
        $prenotazione['stile_id'] = $stileId;
        SessionManager::set('prenotazione', $prenotazione);

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

        $prenotazione = SessionManager::get('prenotazione', []);
        $prenotazione['data'] = $data;
        SessionManager::set('prenotazione', $prenotazione);

        return [
            'status' => 'success',
            'interfaccia' => 'Descrivi la tua idea'
        ];
    }

    // ── Step 4: l'utente scrive l'idea e clicca "Conferma" ──────
    public function richiedi_appuntamento(int $clienteId, string $descrizione): array
    {
        $prenotazione = SessionManager::get('prenotazione', []);

        // Controllo difensivo: l'utente deve aver completato tutti gli step precedenti
        if (
            empty($prenotazione['studio_id']) ||
            empty($prenotazione['tatuatore_id']) ||
            empty($prenotazione['stile_id']) ||
            empty($prenotazione['data'])
        ) {
            return ['status' => 'error', 'message' => 'Prenotazione incompleta'];
        }

        $studio    = $this->pm->read(Studio::class, $prenotazione['studio_id']);
        $tatuatore = $this->pm->read(Tatuatore::class, $prenotazione['tatuatore_id']);
        $stile     = $this->pm->read(Stile::class, $prenotazione['stile_id']);
        $cliente   = $this->pm->read(Cliente::class, $clienteId);

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

        $this->pm->create($appuntamento);

        // La prenotazione è completata, salviamo l'id dell'appuntamento in sessione per il passo successivo
        $prenotazione['appuntamento_id'] = $appuntamento->getId();
        SessionManager::set('prenotazione', $prenotazione);

        return [
            'status' => 'success',
            'interfaccia' => 'Conferma prenotazione',
            'message' => 'Appuntamento richiesto con successo'
        ];
    }

    public function confermaPrenotazione(): array
    {
        $prenotazione = SessionManager::get('prenotazione', []);
        $appuntamentoId = $prenotazione['appuntamento_id'] ?? null;

        if ($appuntamentoId === null) {
            return ['status' => 'error', 'message' => 'Nessuna prenotazione in corso'];
        }

        $appuntamento = $this->pm->read(Appuntamento::class, $appuntamentoId);
        $appuntamento->setStato('CONFERMATO');
        $this->pm->update();

        SessionManager::remove('prenotazione');

        return [
            'status'      => 'success',
            'interfaccia' => 'Schermata conferma',
            'message'     => 'Prenotazione confermata con successo'
        ];
    }


    public function accetta_richiesta(int $appuntamentoId): array
    {
        $appuntamento = $this->pm->read(Appuntamento::class, $appuntamentoId);

        if ($appuntamento === null) {
            return ['status' => 'error', 'message' => 'Appuntamento non trovato'];
        }

        $appuntamento->setStato('CONFERMATO');
        $this->pm->update();


        return [
            'status'      => 'success',
            'interfaccia' => 'Schermata conferma',
            'message'     => 'Prenotazione accettata con successo'
        ];
    }


    public function rifiuta_richiesta(int $appuntamentoId): array
    {
        $appuntamento = $this->pm->read(Appuntamento::class, $appuntamentoId);

        if ($appuntamento === null) {
            return ['status' => 'error', 'message' => 'Appuntamento non trovato'];
        }
        
        $appuntamento->setStato('ANNULLATO');
        $this->pm->update();

        return [
            'status'      => 'success',
            'interfaccia' => 'Schermata conferma',
            'message'     => 'Prenotazione rifiutata'
        ];
    }


    public function concludi_appuntamento(string $stato, float $costo): array
    {
        $appuntamentoId = SessionManager::get('prenotazione', [])['appuntamento_id'] ?? null;

        if ($appuntamentoId === null) {
            return ['status' => 'error', 'message' => 'Nessun appuntamento in corso'];
        }

        $appuntamento = $this->pm->read(Appuntamento::class, $appuntamentoId);
        $appuntamento->setStato($stato);
        $appuntamento->setCosto($costo);
        $this->pm->update();

        return [
            'status'      => 'success',
            'interfaccia' => 'Bottone paga abilitato',
            'message'     => 'Tatuaggio concluso, procedi al pagamento'
        ];
    }


    public function avvia_Pagamento(int $appuntamentoId = 0): array
    {
        if ($appuntamentoId === 0) {
            $appuntamentoId = (int)(SessionManager::get('prenotazione', [])['appuntamento_id'] ?? 0);
        }

        if ($appuntamentoId === 0) {
            return ['status' => 'error', 'message' => 'Nessun appuntamento specificato'];
        }

        $appuntamento = $this->pm->read(Appuntamento::class, $appuntamentoId);

        if ($appuntamento === null) {
            return ['status' => 'error', 'message' => 'Appuntamento non trovato'];
        }

        if ($appuntamento->getStato() !== 'DA_PAGARE') {
            return ['status' => 'error', 'message' => 'Il tatuaggio non è ancora pronto per il pagamento'];
        }

        // Salva in sessione per il passo successivo (form carta)
        $pren = SessionManager::get('prenotazione', []);
        $pren['appuntamento_id'] = $appuntamento->getId();
        SessionManager::set('prenotazione', $pren);

        return [
            'status'          => 'success',
            'interfaccia'     => 'Form dati pagamento',
            'costo'           => $appuntamento->getCosto(),
            'appuntamento_id' => $appuntamento->getId(),
            'message'         => 'Inserisci i dati della carta per procedere al pagamento',
        ];
    }


    public function inserisci_Dati_Pagamento(array $datiCarta): array
    {
        $appuntamentoId = SessionManager::get('prenotazione', [])['appuntamento_id'] ?? null;

        if ($appuntamentoId === null) {
            return ['status' => 'error', 'message' => 'Nessun appuntamento in corso'];
        }

        if (
            empty($datiCarta['numero']) ||
            empty($datiCarta['scadenza']) ||
            empty($datiCarta['cvv']) ||
            (empty($datiCarta['nome']) && empty($datiCarta['intestatario']))
        ) {
            return ['status' => 'error', 'message' => 'Dati carta incompleti'];
        }

        $appuntamento = $this->pm->read(Appuntamento::class, $appuntamentoId);

        if ($appuntamento === null) {
            return ['status' => 'error', 'message' => 'Appuntamento non trovato'];
        }

        // Supporta sia nome+cognome separati che intestatario unico
        if (!empty($datiCarta['nome'])) {
            $nome    = $datiCarta['nome'];
            $cognome = $datiCarta['cognome'] ?? '';
        } else {
            $parti   = explode(' ', $datiCarta['intestatario'], 2);
            $nome    = $parti[0];
            $cognome = $parti[1] ?? '';
        }

        $carta = new CartaDiCredito(
            nomeIntestatario: $nome,
            cognomeIntestatario: $cognome,
            numeroCarta: $datiCarta['numero'],
            dataScadenza: DateTime::createFromFormat('m/Y', $datiCarta['scadenza']),
            cvv: $datiCarta['cvv']
        );

        $pagamento = new Pagamento(
            importo: $appuntamento->getCosto(),
            stato: 'COMPLETATO',
            appuntamento: $appuntamento,
            cartaDiCredito: $carta
        );

        $appuntamento->setStato('COMPLETATO');
        $this->pm->update();
        SessionManager::remove('prenotazione');

        return [
            'status'      => 'success',
            'interfaccia' => 'Esito pagamento',
            'message'     => 'Pagamento effettuato con successo'
        ];
    }
}