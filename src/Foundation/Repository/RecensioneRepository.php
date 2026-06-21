<?php
namespace InkMaster\Foundation\Repository;

use InkMaster\Entity\Recensione;
use InkMaster\Entity\Cliente;
use InkMaster\Entity\Studio;
use InkMaster\Entity\Tatuatore;
use InkMaster\Enum\Citta;
use DateTime;

class RecensioneRepository
{
    private $em;

    public function __construct($entityManager = null)
    {
        $this->em = $entityManager;
    }

    public function salvaRecensione(
        int $voto,
        string $titolo,
        string $descrizione,
        ?string $foto,
        string $stile,
        Cliente $cliente,
        Studio $studio,
        Tatuatore $tatuatore
    ): Recensione {
        $recensione = new Recensione(
            $voto,
            new DateTime(),
            $cliente,
            $studio,
            $titolo,
            $stile,
            $tatuatore,
            $descrizione,
            $foto
        );

        // da implementare con il db:
        // $this->em->persist($recensione);
        // $this->em->flush();

        return $recensione;
    }

    public function deleteRecensione(int $idRecensione): bool
    {
        // Implementazione del metodo per eliminare la recensione
        // Per adesso, simulo l'eliminazione e ritorno true per indicare successo
        return true;
    }

    public function findByStudioId(int $idStudio): array
    {
        $studio = new Studio(
            'InkMaster Roma Centro', '12345678901', Citta::Roma,
            'roma.centro@inkmaster.it', 'inkmaster_roma', 'password123',
            'Studio storico nel cuore di Roma.', '0612345678',
            ['lun-ven' => '10:00-19:00'], ['lun-ven' => '19:00']
        );

        $cliente = new Cliente(
            'Mario', 'Rossi', 'password123', 'mario_rossi',
            new DateTime('1990-05-15'), 'mario.rossi@email.it', 'Roma'
        );

        $tatuatore = new Tatuatore(
            'Marco', 'Neri',
            new DateTime('1988-03-22'), $studio
        );

        return [
            new Recensione(5, new DateTime('2024-03-10'), $cliente, $studio, 'Lavoro fantastico', 'Realistico', $tatuatore, 'Ottimo lavoro, molto soddisfatto.'),
            new Recensione(4, new DateTime('2024-04-15'), $cliente, $studio, 'Molto bravo', 'Blackwork', $tatuatore, 'Professionale e preciso.'),
            new Recensione(3, new DateTime('2024-05-20'), $cliente, $studio, 'Nella media', 'Giapponese', $tatuatore, 'Buon lavoro ma tempi lunghi.'),
        ];
    }

    public function findRecensioniPositiveRandom(int $limit): array
    {
        // TODO: quando ci sarà il DB
        // return $this->em->createQuery(
        //     'SELECT r FROM InkMaster\Entity\Recensione r WHERE r.voto >= 4 ORDER BY RAND()'
        // )->setMaxResults($limit)->getResult();

        $studio = new Studio('InkMaster Roma Centro', '12345678901', Citta::Roma, 'roma.centro@inkmaster.it', 'inkmaster_roma', 'password123', 'Studio storico nel cuore di Roma.', '0612345678', ['lun-ven' => '10:00-19:00'], ['lun-ven' => '19:00']);
        $cliente = new Cliente('Mario', 'Rossi', 'password123', 'mario_rossi', new DateTime('1990-05-15'), 'mario.rossi@email.it', 'Roma');
        $tatuatore = new Tatuatore('Marco', 'Neri', new DateTime('1988-03-22'), $studio);

        $tutte = [
            new Recensione(5, new DateTime('2024-03-10'), $cliente, $studio, 'Lavoro fantastico', 'Realistico', $tatuatore, 'Ottimo lavoro, molto soddisfatto.'),
            new Recensione(5, new DateTime('2024-04-15'), $cliente, $studio, 'Professionale', 'Blackwork', $tatuatore, 'Preciso e puntuale.'),
            new Recensione(4, new DateTime('2024-05-20'), $cliente, $studio, 'Molto bravo', 'Giapponese', $tatuatore, 'Risultato ottimo.'),
            new Recensione(4, new DateTime('2024-06-01'), $cliente, $studio, 'Super consigliato', 'Fine Line', $tatuatore, 'Esperienza fantastica.'),
            new Recensione(5, new DateTime('2024-06-10'), $cliente, $studio, 'Capolavoro', 'Tradizionale', $tatuatore, 'Il migliore in città.'),
        ];

        shuffle($tutte);
        return array_slice($tutte, 0, $limit);
    }
}
