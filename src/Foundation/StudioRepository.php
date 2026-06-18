<?php
namespace InkMaster\Foundation;

use InkMaster\Entity\Studio;
use InkMaster\Enum\Citta; // <-- da correggere in base alla posizione reale del file (vedi nota)

class StudioRepository
{
    private $em;

    public function __construct($entityManager = null)
    {
        $this->em = $entityManager;
    }

    /**
     * @return Studio[]
     */
    public function findAvailableStudios($criteri): array
    {
        return [
            new Studio(
                'InkMaster Roma Centro',
                '12345678901',
                Citta::Roma,
                'roma.centro@inkmaster.it',
                'Studio storico nel cuore di Roma, specializzato in stili realistici e blackwork.',
                '0612345678',
                ['lun-ven' => '10:00-19:00'],
                ['lun-ven' => '19:00']
            ),
            new Studio(
                'InkMaster Milano Navigli',
                '23456789012',
                Citta::Milano,
                'milano.navigli@inkmaster.it',
                'Studio moderno sui Navigli, focus su stili giapponesi e watercolor.',
                '0223456789',
                ['lun-sab' => '11:00-20:00'],
                ['lun-sab' => '20:00']
            ),
            new Studio(
                'InkMaster Napoli Centro',
                '34567890123',
                Citta::Napoli,
                'napoli.centro@inkmaster.it',
                'Studio tradizionale nel centro storico di Napoli.',
                '0813456789',
                ['mar-dom' => '10:00-18:00'],
                ['mar-dom' => '18:00']
            ),
            new Studio(
                'InkMaster Torino Centro',
                '45678901234',
                Citta::Torino,
                'torino.centro@inkmaster.it',
                'Piccolo studio boutique specializzato in tatuaggi geometrici e blackwork.',
                '0114567890',
                ['mar-sab' => '10:30-19:30'],
                ['mar-sab' => '19:30']
            ),
            new Studio(
                'InkMaster Pescara Mare',
                '56789012345',
                Citta::Pescara,
                'pescara.mare@inkmaster.it',
                'Studio sul lungomare di Pescara, ambiente luminoso e rilassato.',
                '0855678901',
                ['lun-ven' => '09:30-18:30'],
                ['lun-ven' => '18:30']
            ),
        ];
    }
}