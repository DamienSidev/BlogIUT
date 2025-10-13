<?php

declare(strict_types=1);

namespace App\Controller;

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
    public function events(Request $request)
    {
//        $start = new \DateTime($request->query->get("start"));
//        $end = new \DateTime($request->query->get("end"));
        return $this->json([
            [
             "title"=> 'Event1',
             "start"=> '2025-10-13'
         ],
         [
             "title"=> 'Event2',
             "start"=>'2025-10-14',
             "backgroundColor"=> 'white'
         ]
        ]);
    }
}
