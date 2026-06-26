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

    public function totalePagatiByStudio(int $idStudio): float
    {
        $result = $this->em->createQueryBuilder()
            ->select('SUM(p.importo)')
            ->from(Pagamento::class, 'p')
            ->join('p.appuntamento', 'a')
            ->where('a.studio = :id AND p.stato = :stato')
            ->setParameter('id', $idStudio)
            ->setParameter('stato', 'COMPLETATO')
            ->getQuery()->getSingleScalarResult();
        return (float)($result ?? 0);
    }

    public function totalePagatiByStudioMese(int $idStudio): float
    {
        $result = $this->em->createQueryBuilder()
            ->select('SUM(p.importo)')
            ->from(Pagamento::class, 'p')
            ->join('p.appuntamento', 'a')
            ->where('a.studio = :id AND p.stato = :stato AND p.data >= :inizio')
            ->setParameter('id', $idStudio)
            ->setParameter('stato', 'COMPLETATO')
            ->setParameter('inizio', new \DateTime('first day of this month midnight'))
            ->getQuery()->getSingleScalarResult();
        return (float)($result ?? 0);
    }

    public function totalePagatiByStudioAnno(int $idStudio): float
    {
        $result = $this->em->createQueryBuilder()
            ->select('SUM(p.importo)')
            ->from(Pagamento::class, 'p')
            ->join('p.appuntamento', 'a')
            ->where('a.studio = :id AND p.stato = :stato AND p.data >= :inizio')
            ->setParameter('id', $idStudio)
            ->setParameter('stato', 'COMPLETATO')
            ->setParameter('inizio', new \DateTime('first day of january this year midnight'))
            ->getQuery()->getSingleScalarResult();
        return (float)($result ?? 0);
    }
}