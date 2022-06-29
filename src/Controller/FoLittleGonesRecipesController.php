<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FoLittleGonesRecipesController extends AbstractController
{
    #[Route('/recettes-ptits-gones', name: 'app_fo_little_gones_recipes')]
    public function index(): Response
    {
        return $this->render('fo_little_gones_recipes/little_gones_recipes.html.twig', [
            'controller_name' => 'FoLittleGonesRecipesController',
        ]);
    }
}
