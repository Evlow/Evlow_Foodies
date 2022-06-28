<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    #[Route('/connexion', name: 'app_security', methods:['GET', 'POST'])]
    public function index(): Response
    {
        return $this->render('security/security.html.twig', [
        ]);
    }
}
