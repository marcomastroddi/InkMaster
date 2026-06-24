<?php

namespace InkMaster\Control\ControllerStudio;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Foundation\SessionManager;

use InkMaster\Entity\Pagamento;
use InkMaster\Entity\CartaDiCredito;
use InkMaster\Entity\Appuntamento;

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
        $appuntamento = $this->pm->read(\InkMaster\Entity\Appuntamento::class, $idAppuntamento);

        if ($appuntamento === null) {
            return ['status' => 'error', 'message' => 'Appuntamento non trovato.'];
        }

        $appuntamento->setStato($stato);
        $this->pm->update();

        return [
            'status'  => 'success',
            'message' => 'Stato aggiornato a: ' . $stato
        ];
    }

    public function aggiungiPagamento(int $idAppuntamento, float $importo, int $idCarta): array
    {
        $appuntamento = $this->pm->read(Appuntamento::class, $idAppuntamento);

        if ($appuntamento === null) {
            return ['status' => 'error', 'message' => 'Appuntamento non trovato.'];
        }

        $carta = $this->pm->read(CartaDiCredito::class, $idCarta);

        if ($carta === null) {
            return ['status' => 'error', 'message' => 'Carta di credito non trovata.'];
        }

        $appuntamento->setCosto($importo);
        $this->pm->update();

        $pagamento = new Pagamento($importo, 'COMPLETATO', $appuntamento, $carta);
        $this->pm->create($pagamento);

        return [
            'status'      => 'success',
            'message'     => 'Pagamento di €' . $importo . ' registrato con successo.',
            'interfaccia' => 'Pagamenti aggiornati'
        ];
    }
}