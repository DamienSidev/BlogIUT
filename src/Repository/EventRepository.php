<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Event>
 */
class EventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Event::class);
    }

    public function findByDate(\DateTime $start, \DateTime $end)
    {
        $qb = $this->createQueryBuilder("e")
            ->leftJoin("e.users", "u")
        ;

        $qb->andWhere($qb->expr()->between("e.date", ":start", ":end"));
        $qb->setParameter("start", $start->format("Y-m-d 00:00:00"));
        $qb->setParameter("end", $end->format("Y-m-d 23:59:59"));

        return $qb->getQuery()->getResult();
    }
}
