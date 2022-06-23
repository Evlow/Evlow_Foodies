<?php

namespace App\Controller;

use App\Entity\Recipes;
use App\Form\RecipeType;
use Monolog\DateTimeImmutable;
use App\Repository\RecipesRepository;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BoRecipesController extends AbstractController
{

  #[Route('/ajouter-recette', name: 'app_bo_recipes_add')]
    public function RecipeAdd(Request $request, RecipesRepository $doctrine): Response
    {
        // On instancie notre objet produit
        $recipe = new Recipes();

        // On initialise nos champs dates avec la date d'aujourd'hui
        $recipe->setCreatedAt(new DateTimeImmutable('now'));

        // Etape 01 : Crée une instance de la classe Form à partir de la classe Recipes
        $formRecipe = $this->createForm(RecipeType::class, $recipe);
        // Etape 02 : Permet de gérer le traitement de la saisie du formulaire.
        $formRecipe->handleRequest($request);

        // Etape 03 : test si le formulaire a été saisi et si les règles de validations sont vérifiées
        if($formRecipe->isSubmitted() && $formRecipe->isValid())
        {
            $entityManager = $doctrine->getManager();
            // Etape 3.1 : On demande à doctrine de surveiller / gerer l'objet en cours
            $entityManager->persist($recipe);
            // Etape 3.2 : On envoi les données a la bdd
            $entityManager->flush();
            // Etape 3.3 : Affichage d'un message succès
            $this->addFlash('success_product', 'La recette '. $recipe->getTitle(). ' a été ajouté !');
            // Etape 3.4 : redirection
            return $this->redirectToRoute('app_fo_home');
        }
        
        return $this->render('bo_recipes/recipes.html.twig', [
            //Enevoi variables à la vue
            'form_title' => 'Ajouter une recette',
            'recipes' => 'recipes',
            'form_submit' => 'Ajoutez',
            'formRecipe' => $formRecipe->createView()
        ]);
    }



}
