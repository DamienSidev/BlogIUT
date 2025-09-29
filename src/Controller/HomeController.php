<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\PostType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route("/", name: "home")]
    public function home(EntityManagerInterface $em): Response
    {
        return $this->render('index.html.twig', [
            "articles" => $em->getRepository(Article::class)->findAll(),
        ]);
    }

    #[Route("/new", name: "new", methods: ["GET", "POST"])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $article = new Article();
        $form = $this->createForm(PostType::class, $article);
        $form->handleRequest($request);

        if ($request->isMethod("POST")) {
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute("article_show", [
                "id" => $article->getId()
            ]);
        }

        return $this->render("home.html.twig", [
            "form" => $form
        ]);
    }

    #[Route("/{id}", name: "article_show", requirements: ["id" => "\d+"], methods: ["GET"])]
    public function show(Article $article, EntityManagerInterface $em)
    {
//        $article = $em->getRepository(Article::class)->find($id);

        return $this->render("articles.html.twig", [
            "article" => $article
        ]);
    }

    #[Route("/edit/{id}", name: "edit", requirements: ["id" => "\d+"], methods: ["GET", "POST"])]
    public function edit(Article $article, Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(PostType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em->flush();
                $this->addFlash('success', "L'article a bien été modifié");
            } catch (\Exception $exception) {
                $this->addFlash('error', $exception->getMessage());
            }

            return $this->redirectToRoute("article_show", [
                "id" => $article->getId()
            ]);
        }

        return $this->render("article/edit.html.twig", [
            "form" => $form,
            "article" => $article
        ]);
    }
}
