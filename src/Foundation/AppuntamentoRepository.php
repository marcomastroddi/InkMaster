<?php
namespace InkMaster\Foundation;

use InkMaster\Entity\Appuntamento;
use InkMaster\Entity\Cliente;
use InkMaster\Entity\Studio;
use InkMaster\Entity\Tatuatore;
use InkMaster\Enum\Citta;
use DateTime;

class AppuntamentoRepository
{
    private $em;

    public function __construct($entityManager = null)
    {
        $this->em = $entityManager;
    }

    public function findById(int $id): ?Appuntamento
    {
        $studio = new Studio(
            'InkMaster Roma Centro',
            '12345678901',
            Citta::Roma,
            'roma.centro@inkmaster.it',
            'Studio storico nel cuore di Roma.',
            '0612345678',
            ['lun-ven' => '10:00-19:00'],
            ['lun-ven' => '19:00']
        );

        $cliente = new Cliente(
            'Mario', 'Rossi', 'password123',
            new DateTime('1990-05-15'),
            'mario.rossi@email.it', 'Roma'
        );

        $tatuatore = new Tatuatore(
            'Marco', 'Neri', 'password123',
            new DateTime('1988-03-22'),
            $studio
        );

        return new Appuntamento(
            new DateTime('2024-06-01'),
            DateTime::createFromFormat('H:i', '10:00'),
            DateTime::createFromFormat('H:i', '11:00'),
            'IN_ATTESA',
            $cliente,
            $studio,
            $tatuatore,
            'Stile richiesto: Realistico'
        );
    }
}