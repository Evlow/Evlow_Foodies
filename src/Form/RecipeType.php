<?php

namespace App\Form;

use App\Entity\Recipes;
use App\Entity\Category;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Title', TextType::class, [
                'label' => "Titre de la recette :",
                "attr" => [
                    "class" => "title-recipe"
                ]

            ])
            
            ->add('imageFile', VichImageType::class, [
                'label' => 'Image de la recette :',
                "attr" => [
                    "class" => "image-recipe"
                ],
                'allow_delete' => false,
                'download_label' => false,
                'required' => false,


            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description :',
                'required' => false,
                "attr" => [
                    "class" => "label-preparation"
                ]
            ])
            ->add('ingredient_1', TextType::class, [
                'label' => 'Ingrédient n°1 :',
                "attr" => [
                    "class" => "label-recipe"
                ]
            ])
            ->add('ingredient_2', TextType::class, [
                'label' => 'Ingrédient n°2 :',
                "attr" => [
                    "class" => "label-recipe"
                ]
            ])
            ->add('ingredient_3', TextType::class, [
                'label' => 'Ingrédient n°3 :',
                'required' => false,
                "attr" => [
                    "class" => "label-recipe"
                ]

            ])
            ->add('ingredient_4', TextType::class, [
                'label' => 'Ingrédient n°4 :',
                'required' => false,
                "attr" => [
                    "class" => "label-recipe:"
                ]
            ])
            ->add('ingredient_5', TextType::class, [
                'label' => 'Ingrédient n°5 :',
                'required' => false,
                "attr" => [
                    "class" => "label-recipe:"
                ]
            ])
            ->add('ingredient_6', TextType::class, [
                'label' => 'Ingrédient n°6 :',
                'required' => false,
                "attr" => [
                    "class" => "label-recipe"
                ]
            ])
            ->add('ingredient_7', TextType::class, [
                'label' => 'Ingrédient n°7 :',
                'required' => false,
                "attr" => [
                    "class" => "label-recipe"
                ]
            ])
            ->add('ingredient_8', TextType::class, [
                'label' => 'Ingrédient n°8 :',
                'required' => false,
                "attr" => [
                    "class" => "label-recipe"
                ]
            ])
            ->add('ingredient_9', TextType::class, [
                'label' => 'Ingrédient n°9 :',
                'required' => false,
                "attr" => [
                    "class" => "label-recipe"
                ]
            ])
            ->add('ingredient_10', TextType::class, [
                'label' => 'Ingrédient n°10 :',
                'required' => false,
                "attr" => [
                    "class" => "label-recipe"
                ]
            ])
            ->add('ingredient_11', TextType::class, [
                'label' => 'Ingrédient n°11 :',
                'required' => false,
                "attr" => [
                    "class" => "label-recipe"
                ]
            ])
            ->add('ingredient_12', TextType::class, [
                'label' => 'Ingrédient n°12 :',
                'required' => false,
                "attr" => [
                    "class" => "label-recipe"
                ]
            ])

            ->add('preparation_1', TextareaType::class, [
                'label' => 'Préparation n°1 :',
                "attr" => [
                    "class" => "label-preparation"
                ]
            ])
            ->add('preparation_2', TextareaType::class, [
                'label' => 'Préparation n°2 :',
                "attr" => [
                    "class" => "label-preparation"
                ]
            ])
            ->add('preparation_3', TextareaType::class, [
                'label' => 'Préparation n°3 :',
                "attr" => [
                    "class" => "label-preparation"
                ],
                'required' => false
            ])
            ->add('preparation_4', TextareaType::class, [
                'label' => 'Préparation n°4 :',
                "attr" => [
                    "class" => "label-preparation"
                ],
                'required' => false,
            ])
            ->add('preparation_5', TextareaType::class, [
                'label' => 'Préparation n°5 :',
                'required' => false,
                "attr" => [
                    "class" => "label-preparation"
                ],

            ])
            ->add('preparation_6', TextareaType::class, [
                'label' => 'Préparation n°6 :',
                'required' => false,
                "attr" => [
                    "class" => "label-preparation"
                ],
            ])

            ->add('category', EntityType::class, [
                'class'  => Category::class,
                'label' => 'Catégorie :',
                "attr" => [
                    "class" => "label-preparation"
                ],

            ]);
            
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipes::class,
        ]);
    }
}
