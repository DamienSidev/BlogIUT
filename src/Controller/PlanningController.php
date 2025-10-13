<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route("/planning", name: "planning_")]
class PlanningController extends AbstractController
{
    #[Route('/', name: "index")]
    public function index(): Response
    {
        return $this->render('planning/index.html.twig');
    }

    #[Route("/events", name: "events")]
    public function events(Request $request, EventRepository $repo)
    {
        $start = new \DateTime($request->query->get("start"));
        $end = new \DateTime($request->query->get("end"));
        $events = $repo->findByDate($start, $end);
        $tabEvents = [];
        foreach ($events as $event) {
            $startDate = new \DateTimeImmutable($event->getDate()->format("Y-m-d 08:00:00"));
            $endDate = $startDate->modify("+" . $event->getDuration() . " minutes");
            $tabEvents[] = [
                "id" => $event->getId(),
                "title" => $event->getTitle(),
                "start" => $startDate->format("Y-m-d H:i"),
                "end" => $endDate->format("Y-m-d H:i")
            ];
        }
        return $this->json($tabEvents);
    }
}
