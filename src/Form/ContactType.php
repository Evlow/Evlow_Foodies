<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                "label" => false,
                "attr" => [
                    "placeholder" => "*Nom",
                    "class" => "label",

                ]
            ])
            ->add('lastName', TextType::class, [
                "label" => false,
                "attr" => [
                    "placeholder" => "*Prénom",
                    "class" => "label"
                ]
            ])
            ->add('email', EmailType::class, [
                "label" => false,
                "attr" => [
                    "placeholder" => "*Email",
                    "class" => "label"
                ]
            ])
            ->add('message', TextareaType::class, [
             
                "label" => false,
                "attr" => [
                    "placeholder"=> "*Veuillez écrire votre message",
                    "class" =>
                    "textarea"
                ]
            ])
            ->add('envoyer', SubmitType::class, [
                "label" => "Envoyer le message",
                "attr" => [
                    "class" => 'button-connect'
                ]
            ]);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([]);
    }
}
