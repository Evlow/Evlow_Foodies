<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Recipes;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Title', TextType::class, [
                'label'=>"Titre de la recette"
            ])
            ->add('imageFile', VichImageType::class, [
                'label' => 'Image de la recette'
            ])
            ->add('ingredient_1', TextType::class, [
                'label' => 'ingrédient n°1'
            ])
            ->add('ingredient_2', TextType::class, [
                'label' => 'ingrédient n°2'
            ])
            ->add('ingredient_3', TextType::class, [
                'label' => 'ingrédient n°3',
                'required' => false
            ])
            ->add('ingredient_4', TextType::class, [
                'label' => 'ingrédient n°4',
                'required' => false
            ])
            ->add('ingredient_5', TextType::class, [
                'label' => 'ingrédient n°5',
                'required' => false
            ])
            ->add('ingredient_6', TextType::class, [
                'label' => 'ingrédient n°6'
            ])
            ->add('ingredient_7', TextType::class, [
                'label' => 'ingrédient n°7',
                'required' => false
            ])
            ->add('ingredient_8', TextType::class, [
                'label' => 'ingrédient n°8',
                'required' => false
            ])
            ->add('ingredient_9', TextType::class, [
                'label' => 'ingrédient n°9'
            ])
            ->add('ingredient_10', TextType::class, [
                'label' => 'ingrédient n°10',
                'required' => false
            ])

            ->add('preparation_1', TextareaType::class, [
                'label' => 'préparation n°1'
            ])
            ->add('preparation_2', TextareaType::class, [
                'label' => 'préparation n°2'
            ])
            ->add('preparation_3', TextareaType::class, [
                'label' => 'préparation n°3',
                'required' => false
            ])
            ->add('preparation_4', TextareaType::class, [
                'label' => 'préparation n°4',
                'required' => false
            ])
            ->add('preparation_5', TextareaType::class, [
                'label' => 'préparation n°5',
                'required' => false
            ])
            ->add('category', ChoiceType::class,[
                'choices' => Category::class,
             
                ])
                ;
            
         
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipes::class,
        ]);
    }
}
