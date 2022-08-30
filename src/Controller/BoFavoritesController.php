<?php

namespace App\Controller;

use App\Entity\Favoris;
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
        $user = $this->getUser();
        // dd($user);
        $recipes = $doctrine->getRepository(Recipes::class)->findBy(['users' => $this->getUser()]);
        $favoris = $doctrine->getRepository(Favoris::class)->findBy(['users' => $this->getUser()]);
         dd($favoris);


        return $this->render('pages/back/favorites.html.twig', [
            'recipes' => $recipes,
        ]);
    }

    #[Route('/ajout-favoris/{id}', name: 'add_bo_favorites')]

    public function addFavoris(Recipes $recipe, EntityManagerInterface $entityManager, ManagerRegistry $doctrine)
    {
        
        $favoris = new Favoris();
        $favoris->setUsers($this->getUser());
        $favoris->setRecipe($recipe);

        $entityManager->persist($favoris);
        $entityManager->flush();

        $recipes = $doctrine->getRepository(Recipes::class)->findAll();

        return $this->render('pages/front/home.html.twig', [
            'recipes' => $recipes,

        ]);
    }

    #[Route('/retrait-favoris/{id}', name: 'remove_bo_favorites')]


    public function removeFavoris(Recipes $recipe, EntityManagerInterface $entityManager, $favoris)
    {

        $favoris->removeFavori($this->getUser());
        $entityManager->persist($favoris);
        $entityManager->flush();
        return $this->render('pages/front/home.html.twig', [
            'recipes' => $recipe,
        ]);
    }

}
