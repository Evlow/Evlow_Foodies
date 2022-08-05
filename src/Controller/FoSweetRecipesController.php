<?php

namespace App\Controller;

use App\Repository\RecipesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FoSweetRecipesController extends AbstractController
{
    #[Route('/recettes-sucrées', name: 'app_fo_sweet_recipes')]
    public function index(RecipesRepository $repository): Response    {
        $recipe = $repository->findBy([
            'category' => 2,
        ]);
    
        return $this->render('pages/front/sweet_recipes.html.twig', 
        [
           'recipes'=>$recipe,
           
        ]);
    } 
}
