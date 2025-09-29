<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route("/admin", name: "admin_")]
#[IsGranted(["ROLE_ADMIN"])]
class AdminController extends AbstractController
{
    #[Route('/', name: "index")]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    #[Route('/settings', name: 'settings')]
    public function settings()
    {
        return $this->render('admin/settings.html.twig');
    }
}
