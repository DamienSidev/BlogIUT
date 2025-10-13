<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route("/event", name: "event_")]
class EventController extends AbstractController
{
    #[Route('/new', name: "new")]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $date = new \DateTime($request->query->get("date"));
        $event = new Event($date, $this->getUser());
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($event);
            $em->flush();

            $this->addFlash('success', "L'evenement a ete créé");

            return $this->redirectToRoute('planning_index');
        }

        return $this->render('event/new.html.twig', [
            'form' => $form,
        ]);

        dd($event);
//        return $this->render('event/index.html.twig');
    }
}
