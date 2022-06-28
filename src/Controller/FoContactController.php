<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FoContactController extends AbstractController
{
    #[Route('/contact', name: 'app_fo_contact')]
    public function index(): Response
    {
        return $this->render('fo_contact/contact.html.twig', [
            'controller_name' => 'FoContactController',
        ]);
    }
}
