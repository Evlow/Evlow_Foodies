<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BoFavoritesController extends AbstractController
{
    #[Route('/mes-favoris', name: 'app_bo_favorites')]
    public function index(): Response
    {
        return $this->render('pages/back/favorites.html.twig', [
            'controller_name' => 'BoFavoritesController',
        ]);
    }
}
