<?php
namespace InkMaster\Foundation\Repository;

use InkMaster\Entity\Amministratore;

class AmministratoreRepository
{
    private $em;

    public function __construct($entityManager = null)
    {
        $this->em = $entityManager;
    }

    public function findByUsername(string $username): ?Amministratore
    {
        $admin = new Amministratore('Admin', 'InkMaster', 'admin123', 'admin');
        
        if ($admin->getUsername() === $username) {
            return $admin;
        }

        return null;
    }
}