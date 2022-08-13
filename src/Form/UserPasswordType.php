<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserPasswordType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'label' => false,
                'first_options' => [
                    'label' => false,
                    'attr' => [
                       
                        'placeholder' => 'Saissisez votre mot de passe actuel',
                    ],
                    
                ],
                'second_options' => [
                    'label' => false,
                    'attr' => [
    
                        'placeholder' => 'Confirmez votre mot de passe actuel'
                    ],

                ],
                'invalid_message' => 'Les mots de passe ne sont pas identiques.',
                "attr" => [
                    "class" => "error-password"
                ],

             ])

            ->add('newPassword', PasswordType::class, [
                'label' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'placeholder' => 'Nouveau mot de passe'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci d\'entrer votre mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit comporter au moins 6 caractères',
                        'max' => 4096,
                    ]),
                ],
            ])

            ->add('envoyer', SubmitType::class, [
                "label" => "Modifier mon mot de passe",
                "attr" => [
                    "class" => 'button-edit'
                ]
            ]);
    }
}
