<?php
namespace InkMaster\Foundation\Repository;

use Doctrine\ORM\EntityRepository;
use InkMaster\Entity\Cliente;
use DateTime;

class ClienteRepository extends EntityRepository
{
    private $em;

    public function __construct($entityManager = null)
    {
        $this->em = $entityManager;
        parent::__construct($entityManager, $entityManager->getClassMetadata(Cliente::class));
    }

    //Metodo che ritorna un Cliente a partire dal suo username
    public function findClienteByUsername(string $username): ?Cliente
    {
        return $this->em->getRepository(Cliente::class)->findOneBy(['username' => $username]);
    }

    public function countClienti(): int
    {
        return $this->em->getRepository(Cliente::class)->count([]);
    }
}