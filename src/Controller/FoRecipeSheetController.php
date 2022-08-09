<?php

namespace App\Controller;


use App\Repository\RecipesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FoRecipeSheetController extends AbstractController
{
    #[Route('/recette/fiche-recette/{id}', name: 'app_fo_recipe_sheet')]
    public function index( int $id, RecipesRepository $repository): Response
    {
        $recipes = $repository->findBy($id);
        return $this->render('pages/front/recipe_sheet.html.twig', [
            'recipes'=>$recipes,
           
            
        ]);

    
    }
}

