<?php

namespace App\Repository;

use App\Entity\ClienteDireccion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ClienteDireccion|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClienteDireccion|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClienteDireccion[]    findAll()
 * @method ClienteDireccion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClienteDireccionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ClienteDireccion::class);
    }

//    /**
//     * @return ClienteDireccion[] Returns an array of ClienteDireccion objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ClienteDireccion
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
