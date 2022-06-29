<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BoBasketController extends AbstractController
{
    #[Route('/corbeille', name: 'app_bo_basket')]
    public function index(): Response
    {
        return $this->render('bo_basket/basket.html.twig', [
            'controller_name' => 'BoBasketController',
        ]);
    }
}
