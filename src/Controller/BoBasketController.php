<?php

namespace App\Controller;

use App\Entity\Recipes;
use App\Repository\RecipesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BoBasketController extends AbstractController
{
    #[Route('/corbeille', name: 'app_bo_basket')]
    public function index(RecipesRepository $repository): Response
    {
        $recipe = $repository->findBy([
            'basket' =>0 ,
        ]);
        return $this->render('pages/back/corbeille.html.twig', [
            'controller_name' => 'BoBasketController',
            'recipes'=> $recipe,
        ]);
    }
    #[Route('/corbeille/{id}', name: 'recipes_delete')]
    public function deleteRecipes(Recipes $recipe = null, Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid("SUP" . $recipe->getId(), $request->get('_token'))) {
        }
        $title = $recipe->getTitle();
        //Prepare la requete de suppression
        $entityManager->remove($recipe);
        // Modifie la base de données
        $entityManager->flush();

        $this->addFlash("success", "La supression de la $recipe: ' $title ' a été effectuée");
        return $this->redirectToRoute("bo_basket");
    }



    #[Route('/corbeille/{id}', name: 'recipes_on')]
    public function OnRecipes(Recipes $recipe = null, Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid("ON" . $recipe->getId(), $request->get('_token'))) {
        }
        $title = $recipe->getTitle();
        $recipe->setBasket(0);
        $entityManager->persist($recipe);
        $entityManager->flush();

        $this->addFlash("success", "La  $recipe : ' $title ' est disponible");
        return $this->redirectToRoute("app_bo_dashboard");
    }
}

