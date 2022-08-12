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
                ->to('mathilde.peauger@gmail.com') 
                ->subject('Message concernant Evlow Foodies')
                ->text($contact->getMessage());
                
            $mailer->send($email);

            $this->addFlash('contact', 'Votre message a bien été envoyé ! Je vous répondrai dans les plus brefs délais. ');
        }

        return $this->render('pages/front/contact.html.twig', [
            'formContact' => $form->createView()
        ]);
}
}