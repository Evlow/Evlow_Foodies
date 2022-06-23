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
        $recipes = $doctrine->getRepository(Recipes::class)->findBy([],['id' => 'DESC'], 4);
        return $this->render('fo_home/home.html.twig', [
            'recipes' => $recipes,
        ]);
    }
}
