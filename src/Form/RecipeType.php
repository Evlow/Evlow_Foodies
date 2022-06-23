<?php

namespace App\Form;

use App\Entity\Recipes;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Title', TextType::class)
            ->add('description',  TextType::class)
            ->add('ingredients',  TextType::class)
            ->add('preparations',  TextType::class)
            ->add('picture')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipes::class,
        ]);
    }
}
