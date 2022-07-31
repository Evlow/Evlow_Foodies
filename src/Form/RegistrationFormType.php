<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                "label" => false,
                "attr" => [
                    "placeholder" => "*Nom :",
                    "class" => "",

                ]
            ])
            ->add('lastName', TextType::class, [
                "label" => false,
                "attr" => [
                    "placeholder" => "*Prénom :",
                    "class" => ""
                ]
            ])

            ->add('pseudo', TextType::class, [
                "label" => false,
                "attr" => [
                    "placeholder" => "Pseudo :",
                    "class" => ""
                ]
            ])
            ->add('email', EmailType::class, [
                "label" => false,
                "attr" => [
                    "placeholder" => "*Email :",
                    "class" => ""
                ]
            ])


            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'label' => false,
                'first_options'  => [
                    'label' => false,
                    'attr' => [
                        'placeholder' => '*Mot de passe'
                    ]
                ],
                'second_options' => [
                    'label' => false,
                    'attr' => [
                        'placeholder' => '*Confirmer votre mot de passe'
                    ]
                ],
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password'
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
            ->add('Envoyer', SubmitType::class, [
                "label" => "Envoyer le message",
                "attr" => [
                    "class" => 'button-connect'
                ]
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => "En cochant cette case, je reconnais avoir pris connaissance de la Politique de Confidentialité.",
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter nos conditions..',
                    ]),
                ],

            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
