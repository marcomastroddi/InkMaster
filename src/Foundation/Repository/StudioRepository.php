<?php
namespace InkMaster\Foundation\Repository;

use InkMaster\Entity\Studio;
use InkMaster\Enum\Citta; 
use InkMaster\Entity\Pubblicazione;
use InkMaster\Entity\Tatuaggio;
use DateTime;
use InkMaster\Entity\Tatuatore;
use InkMaster\Entity\Stile;

use Doctrine\ORM\EntityRepository;

class StudioRepository extends EntityRepository
{
    private $em;

    public function __construct($entityManager = null)
    {
        $this->em = $entityManager;
    }

    /**
     * @return Studio[]
     */
    public function findAvailableStudios(array $criteri): array
    {
        $qb = $this->em->createQueryBuilder();
        $qb->select('s')->from(Studio::class, 's');

        if (($criteri['tipo'] ?? '') === 'testo') {
            $qb->where('s.nome LIKE :testo OR s.descrizione LIKE :testo')
            ->setParameter('testo', '%' . $criteri['testo'] . '%');
        } else {
            $qb->where('s.posizione = :citta')
            ->setParameter('citta', \InkMaster\Enum\Citta::from($criteri['citta']));

            if (!empty($criteri['stile'])) {
                $qb->join('s.tatuatori', 't')
                ->join('t.stili', 'st')
                ->andWhere('st.nome = :stile')
                ->setParameter('stile', $criteri['stile']);
            }
        }

        return $qb->getQuery()->getResult();
    }

    public function findPortfolioByStudioId(int $idStudio): array
    {
        return $this->em->getRepository(Pubblicazione::class)
            ->findBy(['studio' => $idStudio]);
    }

    public function findById(int $id): ?Studio
    {
        return $this->em->getRepository(Studio::class)->find($id);
    }

    public function findByUsername(string $username): ?Studio
    {
        $studi = $this->findAvailableStudios([]);

        foreach ($studi as $studio) {
            if ($studio->getUsername() === $username) {
                return $studio;
            }
        }

        return null;
    }

    public function countStudi(): int
    {
        return $this->em->getRepository(Studio::class)->count([]);
    }
    
    public function findStudiRandom(int $limit): array
    {
        $studi = $this->em->getRepository(Studio::class)->findAll();
        shuffle($studi);
        return array_slice($studi, 0, $limit);
    }
}