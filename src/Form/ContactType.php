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
            ->add('firstName',TextType::class,[
                "label" => "*Prénom:",
                "attr" => [
                "class" => "label",
            
            ]
            ])
            ->add('lastName',TextType::class,[
                "label" => "*Nom:",
                "attr" => [
                "class" => "label"
            ]
            ])
            ->add('email',EmailType::class, [
                "label" => "*Email:",
                "attr" => [
                "class" => "label"
            ]
            ])
            ->add('message', TextareaType::class,[       "label" => "*Nom:",
            "label" => "*Message:",
            "attr" => [
            "class" => 
            "textarea"
            ]
        ])
            ->add('Envoyer', SubmitType::class, [
                "label" => "Envoyer le message",
                "attr" =>[
                    "class" => 'button-connect'
                ]
            ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
        ]);
    }
}
  
