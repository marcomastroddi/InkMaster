<?php

namespace InkMaster\Foundation\Repository;

use InkMaster\Foundation\PersistentManager;
use InkMaster\Entity\Pubblicazione;
use InkMaster\Entity\Studio;
use InkMaster\Entity\Tatuaggio;
use InkMaster\Enum\Citta;
use DateTime;

class PubblicazioneRepository
{
    private $em;

    public function __construct($entityManager = null)
    {
        $this->em = $entityManager;
    }

    public function findDettagliPubblicazione(int $idPubblicazione): ?Pubblicazione
    {
        // Studio e Tatuaggio fittizi di supporto (necessari per costruire le Pubblicazioni)
        $studio = new Studio(
        'InkMaster Roma Centro',
        '12345678901',
        Citta::Roma,
        'roma.centro@inkmaster.it',
        'inkmaster_roma',
        'password123',
        'Studio storico nel cuore di Roma, specializzato in stili realistici e blackwork.',
        '0612345678',
        ['lun-ven' => '10:00-19:00'],
        ['lun-ven' => '19:00']
        );

        $tatuaggio1 = new Tatuaggio(150.00, 'Avambraccio', '15x10 cm');

        return new Pubblicazione(
            'Realismo in bianco e nero',
            new DateTime('2026-05-12'),
            new DateTime('15:30:00'),
            $studio,
            $tatuaggio1,
            '/images/pubblicazioni/realismo_bn.jpg',
            'Dettaglio di un ritratto realistico completato in tre sessioni.'
        );
    }

    public function savePubblicazione($idStudio, $infoPubblicazione)
    {
        // Implementazione del metodo per salvare la pubblicazione
        //Per adesso, simulo il salvataggio e ritorno true per indicare successo
        return true;
    }

    public function deletePubblicazione(int $idPubblicazione): bool
    {
        // Implementazione del metodo per eliminare la pubblicazione
        //Per adesso, simulo l'eliminazione e ritorno true per indicare successo
        return true;
    }
}