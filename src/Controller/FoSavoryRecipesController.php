<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FoSavoryRecipesController extends AbstractController
{
    #[Route('/recettes-salées', name: 'app_fo_savory_recipes')]
    public function index(): Response
    {
        return $this->render('fo_savory_recipes/savory_recipes.html.twig', [
            'controller_name' => 'FoSavoryRecipesController',
        ]);
    }
}
