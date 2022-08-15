<?php

namespace App\Controller;

use App\Entity\Recipes;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FoHomeController extends AbstractController
{
    #[Route('/', name: 'app_fo_home')]
    public function recipesAll(ManagerRegistry $doctrine)
    {
        $recipe = $doctrine->getRepository(Recipes::class)->findBy([],['id' => 'DESC'], 4);
        return $this->render('pages/front/home.html.twig', [
            'recipes' => $recipe,
        ]);
    }
}
