<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\UserType;
use App\Form\UserPasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserController extends AbstractController
{
    #[Route('/utilisateur/edition/{id}', name: 'app_user_edit')]
    public function editUser(Users $user, Request $request, EntityManagerInterface $manager, UserPasswordHasherInterface $userPasswordHasher,): Response
    {

        if (!$this->getUser()) {
            return $this->redirectToRoute('app_fo_registration');
        }

        if ($this->getUser() !== $user) {
            return $this->redirectToRoute('app_fo_login');
        }

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($userPasswordHasher->isPasswordValid($user, $form->getData()->getPlainPassword()))
                $user = $form->getData();
            $manager->persist($user);
            $manager->flush();

            $this->addFlash('success_user', 'Les informations ont bien été modifiées!');
            return $this->redirectToRoute('app_bo_dashboard');
        } else {
            $this->addFlash(
                'error-edit',
                'Le mot de passe est incorrect'
            );
        }
        return $this->render('pages/user/edit_user.html.twig', [
            'UserForm' => $form->createView(),
        ]);
    }


    #[Route('/utilisateur/edition-mot-de-passe/{id}', name: 'app_user_edit_password', methods: ["GET", "POST"])]
    public function editPassword(Users $user, Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $manager): Response
    {

        $form = $this->createForm(UserPasswordType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($userPasswordHasher->isPasswordValid($user, $form->getData()['plainPassword'])) {
                $user->setPassword(
                    $userPasswordHasher->hashPassword(
                        $user,
                        $form->getData() ['newPassword']
                    )
                );
                $manager->persist($user);
                $manager->flush();
                $this->addFlash('edit-password', 'Votre mot de passe a bien été modifié.');

            } else {
                $this->addFlash('error-edit','Le mot de passe est incorrect');
            }
        }
        return $this->render('pages/user/edit_password.html.twig', [
            'PasswordForm' => $form->createView(),
            'user' => $user
        ]);
    }
}
