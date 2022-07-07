<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FoRecipeSheetController extends AbstractController
{
    #[Route('/recette/fiche-recette{id}', name: 'app_fo_recipe_sheet')]
    public function index(): Response
    {
        return $this->render('fo_recipe_sheet/recipe_sheet.html.twig', [
            'controller_name' => 'FoRecipeSheetController',
        ]);
    }
}
