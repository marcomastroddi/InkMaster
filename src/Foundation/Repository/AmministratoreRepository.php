<?php
namespace InkMaster\Foundation\Repository;

use Doctrine\ORM\EntityRepository;
use InkMaster\Entity\Amministratore;

class AmministratoreRepository extends EntityRepository
{
    private $em;

    public function __construct($entityManager = null)
    {
        $this->em = $entityManager;
        parent::__construct($entityManager, $entityManager->getClassMetadata(Amministratore::class));
    }

    //Metodo che ritorna un Amministratore a partire dal suo username
    public function findAmministratoreByUsername(string $username): ?Amministratore
    {
        return $this->em->getRepository(Amministratore::class)->findOneBy(['username' => $username]);
    }

}
