<?php

namespace App\Repository;

use App\Entity\Article;
use App\Services\DatatableService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Article>
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function findWithPaginate(DatatableService $datatable)
    {
        // SELECT * FROM article;
        $qb = $this->createQueryBuilder("a");

        $qb->setFirstResult($datatable->getStart());
        $qb->setMaxResults($datatable->getLength());

        if (count($datatable->getOrder()) > 0) {
            foreach ($datatable->getOrder() as $order) {
                switch ($order["column"]) {
                    case "title":
                        $qb->addOrderBy('a.title', $order["dir"]);
                        break;
                    case "content":
                        $qb->addOrderBy('a.content', $order["dir"]);
                        break;
                    case "createdAtFormatted":
                        $qb->addOrderBy('a.createdAt', $order["dir"]);
                        break;
                    case "updatedAtFormatted":
                        $qb->addOrderBy('a.updatedAt', $order["dir"]);
                        break;
                    default:
                        dd($order);
                }
            }
        }
//        dd(new Paginator($qb));
        return new Paginator($qb);
    }
}
