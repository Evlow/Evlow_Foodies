<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\Mailer\MailerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;



class FoRegistrationController extends AbstractController
{
    #[Route('/inscription', name: 'app_fo_registration')]
    public function index(Request $request, UserPasswordHasherInterface $userPasswordHasher,EntityManagerInterface $entityManager, MailerInterface $mailer): Response
    {

        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request );

        if ($form->isSubmitted() && $form->isValid());
         {  if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
            $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
            )
            );
            $user->setToken($this->generateToken());
            $entityManager->persist($user);
            $entityManager->flush();
            $this->mailer->sendEmail($user->getEmail(), $user->getToken);

            $this->addFlash('succes', 'Votre inscription à bien été éffectuée');
         }
             return $this->render('fo_registration/registration.html.twig', [
            'form'=>$form->createView()
        ]);
    }
}
}