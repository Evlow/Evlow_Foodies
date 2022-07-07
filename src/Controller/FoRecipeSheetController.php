<?php

namespace App\Controller;

use App\Repository\RecipesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FoRecipeSheetController extends AbstractController
{
    #[Route('/recette/fiche-recette', name: 'app_fo_recipe_sheet')]
    public function index(RecipesRepository $repository): Response
    {
        return $this->render('fo_recipe_sheet/recipe_sheet.html.twig', [
            'recipes'=>$repository->findAll()
        ]);
    }
}
