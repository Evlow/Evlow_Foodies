<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FoSpecificRecipesController extends AbstractController
{
    #[Route('/régimes-spécifiques', name: 'app_fo_specific_recipes')]
    public function index(): Response
    {
        return $this->render('fo_specific_recipes/specific_recipes.html.twig', [
            'controller_name' => 'FoSpecificRecipesController',
        ]);
    }
}
