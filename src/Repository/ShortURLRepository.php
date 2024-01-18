<?php

namespace App\Repository;

use App\Entity\ShortURL;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ShortURL>
 *
 * @method ShortURL|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShortURL|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShortURL[]    findAll()
 * @method ShortURL[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShortURLRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShortURL::class);
    }
}
