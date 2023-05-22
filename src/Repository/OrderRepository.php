<?php

namespace App\Repository;

use App\Entity\Order;
use App\Entity\Bakery;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Order>
 *
 * @method Order|null find($id, $lockMode = null, $lockVersion = null)
 * @method Order|null findOneBy(array $criteria, array $orderBy = null)
 * @method Order[]    findAll()
 * @method Order[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Order::class);
    }

    public function add(Order $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Order $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Liste des commandes d'une boulangerie
     */
    public function findOrdersByBakery(int $bakery): array
    {
        // https://symfony.com/doc/5.4/doctrine.html#querying-with-the-query-builder
        $conn  = $this->getEntityManager()->getConnection();


        $query =  '
            SELECT DISTINCT o.id id, o.status status, o.delivery delivery, o.schedule schedule
            -- depuis l\'entité Order
            FROM `order` o
            -- suit la relation de product_order et order
            JOIN product_order op ON o.id = op.order_id
            -- suit la relation de product_order et product
            JOIN product p ON op.product_id = p.id
            -- suit la relation de bakery et product
            JOIN bakery b ON p.bakery_id = b.id
            WHERE b.id = :bakery';

            $stmt = $conn->prepare($query);
            $resultSet = $stmt->executeQuery(['bakery' => $bakery]);
            // dd($resultSet);
            
            // renvoie un tableau e tableaux
            return $resultSet->fetchAllAssociative();
    }

    // public function findAllByMovieJoinedToPersonQb(Movie $movie)
    // {
    //     return $this->createQueryBuilder('c')
    //     // on veut aussi récupérer les personnes !
    //         ->innerJoin('c.person', 'p')
    //         ->addSelect('p')
    //         ->where('c.movie = :movie')
    //         ->setParameter('movie', $movie)
    //         ->orderBy('c.creditOrder', 'ASC')
    //         ->getQuery()
    //         ->getResult();
    // }

//    /**
//     * @return Order[] Returns an array of Order objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Order
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
