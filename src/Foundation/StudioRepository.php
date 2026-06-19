<?php
namespace InkMaster\Foundation;

use InkMaster\Entity\Studio;
use InkMaster\Enum\Citta; 
use InkMaster\Entity\Pubblicazione;
use InkMaster\Entity\Tatuaggio;
use DateTime;

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

    public function findPortfolioByStudioId($idStudio): array
    {
        // Studio e Tatuaggio fittizi di supporto (necessari per costruire le Pubblicazioni)
        $studio = new Studio(
        'InkMaster Roma Centro',
        '12345678901',
        Citta::Roma,
        'roma.centro@inkmaster.it',
        'Studio storico nel cuore di Roma, specializzato in stili realistici e blackwork.',
        '0612345678',
        ['lun-ven' => '10:00-19:00'],
        ['lun-ven' => '19:00']
    );

    $tatuaggio1 = new Tatuaggio(150.00, 'Avambraccio', '15x10 cm');
    $tatuaggio2 = new Tatuaggio(300.00, 'Schiena', '30x20 cm');
    $tatuaggio3 = new Tatuaggio(80.00, 'Polso', '5x5 cm');

    return [
        new Pubblicazione(
            'Realismo in bianco e nero',
            new DateTime('2026-05-12'),
            new DateTime('15:30:00'),
            $studio,
            $tatuaggio1,
            'Dettaglio di un ritratto realistico completato in tre sessioni.',
            '/images/pubblicazioni/realismo_bn.jpg'
        ),
        new Pubblicazione(
            'Drago giapponese full back',
            new DateTime('2026-04-28'),
            new DateTime('17:00:00'),
            $studio,
            $tatuaggio2,
            'Lavoro completo in stile Giapponese, sessione finale di colore.',
            '/images/pubblicazioni/drago_giapponese.jpg'
        ),
        new Pubblicazione(
            'Piccolo blackwork minimal',
            new DateTime('2026-06-02'),
            new DateTime('11:15:00'),
            $studio,
            $tatuaggio3,
            'Tatuaggio minimalista sul polso, perfetto per chi ama i dettagli sottili.',
            '/images/pubblicazioni/blackwork_minimal.jpg'
        ),
    ];
    }
}