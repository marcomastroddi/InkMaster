<?php

namespace InkMaster\Control;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Foundation\SessionManager;

class GestioneClienti
{
    private PersistentManager $pm;

    public function __construct()
    {
        $this->pm = PersistentManager::getInstance();
    }

    public function visualizzaClienti(): array
    {
        $idStudio = SessionManager::get('id_studio', 1); // 1 fittizio per il test

        if (!$idStudio) {
            return ['status' => 'error', 'message' => 'Devi essere loggato come studio.'];
        }

        $appuntamenti = $this->pm->findAppuntamentiByStudioId($idStudio);

        return [
            'status' => 'success',
            'data'   => $appuntamenti
        ];
    }

    public function aggiornaStato(int $idAppuntamento, string $stato): array
    {
        $appuntamento = $this->pm->find(\InkMaster\Entity\Appuntamento::class, $idAppuntamento);

        if ($appuntamento === null) {
            return ['status' => 'error', 'message' => 'Appuntamento non trovato.'];
        }

        $appuntamento->setStato($stato);
        $this->pm->save($appuntamento);

        return [
            'status'  => 'success',
            'message' => 'Stato aggiornato a: ' . $stato
        ];
    }

    public function aggiungiPagamento(int $idAppuntamento, float $importo): array
    {
        $appuntamento = $this->pm->find(\InkMaster\Entity\Appuntamento::class, $idAppuntamento);

        if ($appuntamento === null) {
            return ['status' => 'error', 'message' => 'Appuntamento non trovato.'];
        }

        // TODO: quando ci sarà il DB creare entità Pagamento e collegarla all'appuntamento
        // $pagamento = new Pagamento($importo, 'IN_CORSO', $appuntamento, $cartaDiCredito);
        // $this->pm->save($pagamento);

        return [
            'status'      => 'success',
            'message'     => 'Pagamento di €' . $importo . ' registrato con successo.',
            'interfaccia' => 'Pagamenti aggiornati'
        ];
    }
}