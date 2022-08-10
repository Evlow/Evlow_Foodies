<?php

namespace App\Controller;

use App\Entity\Recipes;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BoFavoritesController extends AbstractController
{
    #[Route('/mes-favoris', name: 'app_bo_favorites')]
    public function index(): Response
    {
        return $this->render('pages/back/favorites.html.twig', [
            'controller_name' => 'BoFavoritesController',
        ]);
    }

    #[Route('/ajout-favoris', name: 'add_bo_favorites')]
    public function addFavoris(Recipes $recipe): Response
    {

        $recipe->addFavori($this->getUser());

        $entityManager = $this->getDoctrine->getManager();
        $entityManager->persiste($recipe);
        $entityManager->flush();
        return $this->redirectToRoute('app_recipe');

        return $this->render('pages/back/favorites.html.twig', [
            'controller_name' => 'BoFavoritesController',
        ]);
    }

    #[Route('/retrait-favoris', name: 'remove_bo_favorites')]
    public function removeFavoris(Recipes $recipe): Response
    {

        $recipe->removeFavori($this->getUser());

        $entityManager = $this->getDoctrine->getManager();
        $entityManager->persiste($recipe);
        $entityManager->flush();
        return $this->redirectToRoute('app_recipe');

        return $this->render('pages/back/favorites.html.twig', [
            'controller_name' => 'BoFavoritesController',
        ]);
    }
}
