<?php

namespace App\Controller;

use App\Repository\RecipesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FoSpecificRecipesController extends AbstractController
{
    #[Route('/régimes-spécifiques', name: 'app_fo_specific_recipes')]
    public function index(RecipesRepository $repository): Response    {
        $recipe = $repository->findBy([
            'category' => 4,
        ]);
    
        return $this->render('fo_specific_recipes/specific_recipes.html.twig', 
        [
           'recipes'=>$recipe,
           
        ]);
    } 
}
