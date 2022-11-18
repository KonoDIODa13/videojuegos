<?php

namespace App\Repository;

use App\Entity\ListaVideojuegos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ListaVideojuegos>
 *
 * @method ListaVideojuegos|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListaVideojuegos|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListaVideojuegos[]    findAll()
 * @method ListaVideojuegos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListaVideojuegosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListaVideojuegos::class);
    }

    public function save(ListaVideojuegos $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ListaVideojuegos $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ListaVideojuegos[] Returns an array of ListaVideojuegos objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ListaVideojuegos
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
