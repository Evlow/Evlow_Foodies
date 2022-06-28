<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FoContactController extends AbstractController
{
    #[Route('/contact', name: 'app_fo_contact')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() ){
        $entityManager->persist($contact);
        $entityManager->flush();
        $this->addFlash('succes', 'Votre message a bien été envoyé');
        }
        return $this->render('fo_contact/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
