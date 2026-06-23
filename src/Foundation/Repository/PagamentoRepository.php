<?php
namespace InkMaster\Foundation\Repository;

use InkMaster\Entity\Pagamento;
use InkMaster\Entity\Appuntamento;


class PagamentoRepository
{
    private $em;

    public function __construct($entityManager = null)
    {
        $this->em = $entityManager;
    }

    public function findPagamentiByStudioId(int $idStudio): array
    {
        return $this->em->createQueryBuilder('p')
            ->select('p')
            ->from(Pagamento::class, 'p')
            ->join('p.appuntamento', 'a')
            ->where('a.studio = :idStudio')
            ->setParameter('idStudio', $idStudio)
            ->getQuery()
            ->getResult();
    }
}