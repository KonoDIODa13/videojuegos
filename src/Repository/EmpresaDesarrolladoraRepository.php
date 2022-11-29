<?php

namespace App\Repository;

use App\Entity\EmpresaDesarrolladora;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EmpresaDesarrolladora>
 *
 * @method EmpresaDesarrolladora|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmpresaDesarrolladora|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmpresaDesarrolladora[]    findAll()
 * @method EmpresaDesarrolladora[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmpresaDesarrolladoraRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmpresaDesarrolladora::class);
    }

    public function save(EmpresaDesarrolladora $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(EmpresaDesarrolladora $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return EmpresaDesarrolladora[] Returns an array of EmpresaDesarrolladora objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EmpresaDesarrolladora
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
