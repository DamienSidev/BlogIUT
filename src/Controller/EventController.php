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
    }

    #[Route("/change/date/{id}", name: "change_date", requirements: ['id' => '\d+'], methods: ['POST'])]
    public function changeDate(Event $event, Request $request, EntityManagerInterface $em)
    {
        $newDate = new \DateTime($request->request->get("newdate"));
        $event->setDate($newDate);
        $em->flush();

        return $this->json(["message" => "Évenement modifié", "type" => "success"]);
    }

    #[Route("/edit/{id}", name: "edit" , requirements: ["id" => "\d+"], methods: ["GET", "POST"])]
    public function edit(Request $request, Event $event, EntityManagerInterface $em): Response{
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em->flush();
                $this->addFlash('success', "L'event a bien été modifié");
            } catch (\Exception $exception) {
                $this->addFlash('error', $exception->getMessage());
            }
        }
        return $this->render('event/edit.html.twig', [
            'form' => $form,
            'event' => $event,
        ]);
    }
}
