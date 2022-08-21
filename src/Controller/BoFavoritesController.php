<?php

namespace App\Controller;

use App\Entity\Recipes;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class BoFavoritesController extends AbstractController
{
    #[Route('/mes-favoris', name: 'app_bo_favorites')]
    public function index(ManagerRegistry $doctrine): Response
    {

        return $this->render('pages/back/favorites.html.twig', [
       
        ]);
    }

    #[Route('/ajout-favoris/{id}', name: 'add_bo_favorites')]

    public function addFavoris(Recipes $recipe,EntityManagerInterface $entityManager, )
{   
  
        $recipe->addFavori($this->getUser());
        $entityManager->persist($recipe);
        $entityManager->flush();
        return $this->render('pages/front/home.html.twig', [
            'recipes' => $recipe,
        ]);
    }

    #[Route('/retrait-favoris/{id}', name: 'remove_bo_favorites')]
 

    public function removeFavoris(Recipes $recipe,EntityManagerInterface $entityManager)
    {
       
        $recipe->removeFavori($this->getUser());
        $entityManager->persist($recipe);
        $entityManager->flush();
        return $this->render('pages/front/home.html.twig', [
            'recipes' => $recipe,
        ]);
    }
}
