<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\PostType;
use App\Repository\ArticleRepository;
use App\Security\Voter\ArticleVoter;
use App\Services\DatatableService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Vich\UploaderBundle\Entity\File;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;

class HomeController extends AbstractController
{
    #[Route("/", name: "home")]
    public function home(EntityManagerInterface $em): Response
    {
        return $this->render('index.html.twig');
    }

    #[Route("/datatable", name: "datatable")]
    public function datatable(DatatableService $datatable, ArticleRepository $repo): Response
    {
//        dd($datatable);
        $datas = $repo->findWithPaginate($datatable);
        return $this->json($datatable->format($datas, $repo), Response::HTTP_OK, [], ['groups' => 'article_datatable'] );
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
    #[IsGranted("IS_AUTHENTICATED_FULLY")]
    public function show(Article $article, EntityManagerInterface $em)
    {
//        $article = $em->getRepository(Article::class)->find($id);

//        dd($article);
        return $this->render("articles.html.twig", [
            "article" => $article
        ]);
    }

    #[Route("/edit/{id}", name: "edit", requirements: ["id" => "\d+"], methods: ["GET", "POST"])]
    #[IsGranted('article_edit', 'article')]
    public function edit(Article $article, Request $request, MailerInterface $mailer, EntityManagerInterface $em)
    {
        $oldTitle = $article->getTitle();
        $form = $this->createForm(PostType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em->flush();
                $this->addFlash('success', "L'article a bien été modifié");
            } catch (\Exception $exception) {
                $this->addFlash('error', $exception->getMessage());
            }

//            $email = (new TemplatedEmail())
//                ->from('damien@si-developpement.fr')
//                ->to(new Address($article->getAuthor()->getEmail(), $article->getAuthor()->getUsername()))
//                ->subject("Votre article a été modifié")
//
//                // path of the Twig template to render
//                ->htmlTemplate('emails/article_edit.html.twig')
//                ->text('Le titre qui était ' . $oldTitle . ' a été remplacé par ' . $article->getTitle())
//
//                // change locale used in the template, e.g. to match user's locale
//                ->locale('fr')
//
//                // pass variables (name => value) to the template
//                ->context([
//                    'article' => $article,
//                    "oldTitle" => $oldTitle,
//                ])
//            ;
//
//            $mailer->send($email);

            return $this->redirectToRoute("article_show", [
                "id" => $article->getId()
            ]);
        }

        return $this->render("edit.html.twig", [
            "form" => $form,
            "article" => $article
        ]);
    }

    #[Route("/article/image/{id}", name: "article_image")]
    public function download(Article $article, UploaderHelper $helper): Response
    {
//        dd($article);
        return $this->file(
            $this->getParameter('article_image_path') . $article->getImageName(),
            $article->getImageName(),
            ResponseHeaderBag::DISPOSITION_INLINE
        );

    }


}
