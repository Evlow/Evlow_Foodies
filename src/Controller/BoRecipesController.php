<?php

namespace App\Controller;

use App\Entity\Recipes;
use App\Form\RecipeType;
use Monolog\DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BoRecipesController extends AbstractController
{
    #[Route('/recettes', name: 'app_recipe')]

    public function viewRecipe(ManagerRegistry $doctrine): Response

    {   //Récupération des recettes de l'utilisateur connecté
        $recipes = $doctrine->getRepository(Recipes::class)->findBy(['users' => $this->getUser()]);

        return $this->render('pages/back/recipes.html.twig', [
            'recipes' => $recipes,

        ]);
    }

    #[Route('/recette/ajouter', name: 'app_bo_recipes_add')]

    public function addRecipe(Request $request, EntityManagerInterface $entityManager): Response

    {   // Recupération de l'utilisateur connecté
        $user = $this->getUser();

        // Instanciation d'une nouvelle recette
        $recipe = new Recipes();

        // Initialisation des champs dates avec la date du jour
        $recipe->setCreatedAt(new DateTimeImmutable('now'));

        $recipe->setUsers($user);

        // Création d'une instance de la classe Form à partir de la classe Recipes
        $formRecipe = $this->createForm(RecipeType::class, $recipe);
        // Gestion du traitement de la saisie du formulaire.
        $formRecipe->handleRequest($request);

        // Test si le formulaire a été saisi et si les règles de validations sont vérifiées
        if ($formRecipe->isSubmitted() && $formRecipe->isValid()) {
            // Demande à doctrine de gèrer l'objet en cours
            $entityManager->persist($recipe);
            // Envoie les données à la base de données
            $entityManager->flush();
            // Affichage d'un message de succès
            $this->addFlash('success_product', 'La recette ' . $recipe->getTitle() . ' a été ajoutée !');
            // Redirection
            return $this->redirectToRoute('app_recipe');
        }

        return $this->render('pages/back/add_recipes.html.twig', [
            'form_title' => 'Ajouter une recette',
            'form_submit' => 'Ajoutez',
            'formRecipe' => $formRecipe->createView()
        ]);
    }


    #[Route('/recette/modifier/{id}', name: 'app_bo_recipes_edit')]

    public function editRecipe($id, Request $request, ManagerRegistry $doctrine): Response
    {
        // Récupération du produit sélectionné avec l'ID
        $recipe = $doctrine->getRepository(Recipes::class)->find($id);

        // Initialisation des champs dates avec la date d'aujourd'hui
        $recipe->setUpdatedAt(new DateTimeImmutable('now'));

        // Création d'une instance de la classe Form à partir de la classe Recipes
        $formRecipe = $this->createForm(RecipeType::class, $recipe);

        // Gestion du traitement de la saisie du formulaire.
        $formRecipe->handleRequest($request);

        // Test si le formulaire a été saisi et si les règles de validations sont vérifiées
        if ($formRecipe->isSubmitted() && $formRecipe->isValid()) {
            $entityManager = $doctrine->getManager();
            // Envoie les données à la base de données
            $entityManager->flush();
            // Affichage d'un message de succès
            $this->addFlash('success_product', 'La recette ' . $recipe->getTitle() . ' a été modifiée !');
            // Redirection
            return $this->redirectToRoute('app_recipe');
        }
        return $this->render('pages/back/edit_recipes.html.twig', [
            'formRecipe' => $formRecipe->createView()
        ]);
    }

    #[Route('/recette/supprimer/{id}', name: 'app_bo_recipes_del')]

    public function deleteRecipe($id, ManagerRegistry $doctrine): RedirectResponse
    {
        // Récupération de la recette sélectionnée avec l'ID
        $recipe = $doctrine->getRepository(Recipes::class)->find($id);

        // Manipulation des entités
        $entityManager = $doctrine->getManager();

        // Préparation de la requête de suppression
        $entityManager->remove($recipe);

        // Modification des données 
        $entityManager->flush();

        // Affichage d'un message de succès
        $this->addFlash('success_edit', 'La recette ' . $recipe->getTitle() . ' a été supprimée !');
        // Redirection
        return $this->redirectToRoute('app_recipe');
    }
}
