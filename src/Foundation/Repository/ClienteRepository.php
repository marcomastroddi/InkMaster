<?php
namespace InkMaster\Foundation\Repository;

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
            'mario_rossi',
            new DateTime('1990-05-15'),
            'mario.rossi@email.it',
            'Roma'
        );
    }

    public function findByUsername(string $username): ?Cliente
    {
        $cliente = new Cliente(
            'Mario', 'Rossi', 'password123', 'mario_rossi',
            new DateTime('1990-05-15'),
            'mario.rossi@email.it', 'Roma'
        );

        if ($cliente->getUsername() === $username) {
            return $cliente;
        }

        return null;
    }

    public function countClienti(): int
    {
        return 3; // fittizio
    }
}