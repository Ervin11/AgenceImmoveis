<?php

namespace App\Repository;

use App\Entity\Offer;
use App\Entity\OfferSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;

/**
 * @method Offer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Offer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Offer[]    findAll()
 * @method Offer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offer::class);
    }

    /**
     * @return Query
     */
    public function findAllVisibleQuery(OfferSearch $search) {

      $query = $this->findVisibleQuery();

      if ($search->getMaxPrice()) {

        $query = $query->andWhere('p.price < :maxprice')
                       ->setParameter('maxprice', $search->getMaxPrice());
      }

      if ($search->getMinSurface()) {

        $query = $query->andWhere('p.surface >= :minsurface')
                       ->setParameter('minsurface', $search->getMinSurface());
      }

      if ($search->getMinRooms()) {

        $query = $query->andWhere('p.rooms >= :minrooms')
                       ->setParameter('minrooms', $search->getMinRooms());
      }

      if ($search->getMinBedRooms()) {

        $query = $query->andWhere('p.bedrooms >= :minbedrooms')
                       ->setParameter('minbedrooms', $search->getMinBedRooms());
      }

      if ($search->getType()) {

          $query = $query->andWhere('p.type = :type')
                         ->setParameter('type', $search->getType());
      }

      if ($search->getHabitat()) {

        $query = $query->andWhere('p.habitat = :habitat')
          ->setParameter('habitat', $search->getHabitat());
      }

      if ($search->getHeat()) {

        $query = $query->andWhere('p.heat = :heat')
          ->setParameter('heat', $search->getHeat());
      }

      if ($search->getCity()) {

        $query = $query->andWhere('p.city LIKE :city')
          ->setParameter('city', '%'.$search->getCity().'%');
      }

      return $query->getQuery();
    }

    /**
    * @return Offer[] Returns an array of Offer objects
    */
    public function findByCity($city) {

      return $this->createQueryBuilder('p')
                  ->where('p.city LIKE :city')
                  ->setParameter('city', $city.'%')
                  ->orderBy('p.created_at', 'DESC')
                  ->getQuery()
                  ->getResult();
    }

    /**
     * @return Offer[] Returns an array of Offer objects
     */
    public function findLastSix() {

      return $this->createQueryBuilder('p')
        ->where('p.sold = false')
        ->setMaxResults(6)
        ->orderBy('p.created_at', 'DESC')
        ->getQuery()
        ->getResult();
    }

    private function findVisibleQuery(): QueryBuilder
    {
      return $this->createQueryBuilder('p')
                  ->where('p.sold = false')
                  ->orderBy('p.created_at', 'desc');
    }

    // /**
    //  * @return Offer[] Returns an array of Offer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Offer
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
