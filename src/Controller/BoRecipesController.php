<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BoRecipesController extends AbstractController
{
    #[Route('/ajouter-recette', name: 'app_bo_recipes')]
    public function index(): Response
    {
        return $this->render('bo_recipes/recipes.html.twig', [
            'controller_name' => 'BoRecipesController',
        ]);
    }
}
