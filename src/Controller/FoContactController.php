<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FoContactController extends AbstractController
{
    #[Route('/contact', name: 'app_fo_contact')]
    public function index(Request $request, EntityManagerInterface $entityManager, MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($contact);
            $entityManager->flush();

            $email = (new Email())
            ->from($contact->getEmail())
            ->to('mathilde.peauger@gmail.com')
            ->subject('Test') 
            ->html($contact);

            $mailer->send($email);
            $this->addFlash('succes', 'Votre message a bien été envoyé');
            
            return $this->redirectToRoute('app_fo_home');
       
        }

        return $this->render('fo_contact/contact.html.twig', [
            'contact_email'=>$this->getParameter('app.contact.email'),
            'form' => $form->createView()
        ]);
    }
}
