<?php

namespace App\Form;

use App\Entity\Comments;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => "Votre e-mail",
                'attr' => [
                    'class' => "form"
                ]
            ])
            ->add('pseudo', TextType::class, [
                'label' => "Pseudo",
                'attr' => [
                    'class' => "form"
                ]
            ])
            ->add('content', CKEditorType::class, [
                'label' => "Votre commentaire",
                'attr' => [
                'class' => "form"
            ]
    ])
            ->add('rgpd', CheckboxType::class)
            ->add('parent', HiddenType::class, [
                "mapped" => false,
            ])
            ->add('Envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comments::class,
        ]);
    }
}
