<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BoDashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_bo_dashboard')]
    public function index(): Response
    {
        return $this->render('pages/back/dashboard.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
}
