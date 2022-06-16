<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BoFavoritesController extends AbstractController
{
    #[Route('/bo/favorites', name: 'app_bo_favorites')]
    public function index(): Response
    {
        return $this->render('bo_favorites/index.html.twig', [
            'controller_name' => 'BoFavoritesController',
        ]);
    }
}
