<?php

namespace App\Services;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepositoryInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class DatatableService
{
    private ?Request $request;
    private ?int $draw;
    private ?int $start;
    private ?int $length;
    private ?string $search;

    private array $order = [];

    public function __construct(RequestStack $requestStack)
    {
        $this->request = $requestStack->getCurrentRequest();
        $this->handleRequest();
    }

    private function handleRequest()
    {
        $this->draw = $this->request->query->get("draw");
        $this->start = $this->request->query->get("start");
        $this->length = $this->request->query->get("length");
        if ($this->request->query->has("search")) {
            $this->search = $this->request->query->all('search')["value"];
        }
        if ($this->request->query->has("order")) {
            $orders = $this->request->query->all('order');
            $columns = $this->request->query->all('columns');
            foreach ($orders as $order) {
                $column = $columns[$order['column']]['data'];
                $this->order[] = [
                    "column" => $column,
                    "dir" => $order['dir']
                ];
            }
//            $this->order = $this->request->query->all("order")[0];
        }
    }

    public function getDarw(): ?int
    {
        return $this->draw;
    }

    public function getStart(): ?int
    {
        return $this->start;
    }

    public function getLength(): ?int
    {
        return $this->length;
    }

    public function getSearch(): ?string
    {
        return $this->search;
    }

    public function getOrder(): ?array
    {
        return $this->order;
    }

    public function format($datas, EntityRepository $repo)
    {
        return [
            "draw" => $this->draw,
            "recordsTotal" => $repo->count(),
            "recordsFiltered" => count($datas),
            "data" => $datas,
        ];
    }
}
