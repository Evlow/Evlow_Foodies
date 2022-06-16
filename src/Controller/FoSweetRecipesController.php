<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FoSweetRecipesController extends AbstractController
{
    #[Route('/recettes-sucrées', name: 'app_fo_sweet_recipes')]
    public function index(): Response
    {
        return $this->render('fo_sweet_recipes/sweet_recipes.html.twig', [
            'controller_name' => 'FoSweetRecipesController',
        ]);
    }
}
