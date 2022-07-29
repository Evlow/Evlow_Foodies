<?php

namespace App\Controller;

use App\Repository\RecipesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FoLittleGonesRecipesController extends AbstractController
{
    #[Route('/recettes-ptits-gones', name: 'app_fo_little_gones_recipes')]
    public function index(RecipesRepository $repository): Response    {
        $recipe = $repository->findBy([
            'category' => 3,
        ]);
    
        return $this->render('oages/front/little_gones_recipes.html.twig', 
        [
           'recipes'=>$recipe,
           
        ]);
    } 
}
