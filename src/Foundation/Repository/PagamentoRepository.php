<?php
namespace InkMaster\Foundation\Repository;

use InkMaster\Entity\Pagamento;
use InkMaster\Entity\Appuntamento;
use InkMaster\Entity\CartaDiCredito;
use InkMaster\Entity\Cliente;
use InkMaster\Entity\Studio;
use InkMaster\Entity\Tatuatore;
use InkMaster\Enum\Citta;
use DateTime;

class PagamentoRepository
{
    private $em;

    public function __construct($entityManager = null)
    {
        $this->em = $entityManager;
    }

    public function findPagamentiByStudioId(int $idStudio): array
    {
        $studio = new Studio(
            'InkMaster Roma Centro', '12345678901', Citta::Roma,
            'roma.centro@inkmaster.it', 'inkmaster_roma',
            'Studio storico nel cuore di Roma.', '0612345678',
            ['lun-ven' => '10:00-19:00'], ['lun-ven' => '19:00']
        );

        $tatuatore = new Tatuatore('Marco', 'Neri', 'password123', new DateTime('1988-03-22'), $studio);

        $cliente1 = new Cliente('Mario', 'Rossi', 'password123', 'mario_rossi', new DateTime('1990-05-15'), 'mario.rossi@email.it', 'Roma');
        $cliente2 = new Cliente('Laura', 'Bianchi', 'password123', 'laura_bianchi', new DateTime('1995-08-20'), 'laura.bianchi@email.it', 'Milano');

        $carta = new CartaDiCredito('Mario', 'Rossi', '1234567890123456', new DateTime('2026-12-01'), '123');

        $appuntamento1 = new Appuntamento(new DateTime('2024-06-01'), DateTime::createFromFormat('H:i', '10:00'), DateTime::createFromFormat('H:i', '11:00'), 'COMPLETATO', $cliente1, $studio, $tatuatore);
        $appuntamento2 = new Appuntamento(new DateTime('2024-06-03'), DateTime::createFromFormat('H:i', '14:00'), DateTime::createFromFormat('H:i', '15:30'), 'IN_CORSO', $cliente2, $studio, $tatuatore);

        return [
            new Pagamento(150.00, 'COMPLETATO', $appuntamento1, $carta),
            new Pagamento(200.00, 'IN_CORSO',   $appuntamento2, $carta),
        ];
    }
}