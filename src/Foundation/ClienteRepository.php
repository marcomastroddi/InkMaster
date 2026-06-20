<?php
namespace InkMaster\Foundation;

use InkMaster\Entity\Cliente;
use DateTime;

class ClienteRepository
{
    private $em;

    public function __construct($entityManager = null)
    {
        $this->em = $entityManager;
    }

    public function findById(int $id): ?Cliente
    {
        return new Cliente(
            'Mario',
            'Rossi',
            'password123',
            new DateTime('1990-05-15'),
            'mario.rossi@email.it',
            'Roma'
        );
    }
}