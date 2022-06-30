<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FoContactController extends AbstractController
{
    #[Route('/contact', name: 'app_fo_contact')]

    public function index(Request $request, EntityManagerInterface $entityManager, MailerInterface $mailer)
    {
        $contact = new Contact(); 
        
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            $entityManager->persist($contact);
            $entityManager->flush();

            $email = (new Email())
                ->from($contact->getEmail())
                ->to('admin@evlowfoodies.com');              
            $mailer->send($email);

            $this->addFlash('success', 'Votre message a bien été envoyé');
        }

        return $this->render('fo_contact/contact.html.twig', [
            'formContact' => $form->createView()
        ]);
}
}