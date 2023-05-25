<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType as TypeIntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du produit',
                'attr' => [
                    // le placeholder est un attribut HTML
                    'placeholder' => 'ex. Pain au chocolat',
                ]
            ])

            ->add('price', NumberType::class, [
                'label' => 'Prix du produit',
                'attr' => [
                    // le placeholder est un attribut HTML
                    'placeholder' => 'ex. 0,90',
                ]
            ])

            ->add('stock', TypeIntegerType::class, [
                'label' => 'Nombre de produit en stock',
                'attr' => [
                    // le placeholder est un attribut HTML
                    'placeholder' => 'ex. 15',
                ]
            ])

            ->add('description', TextType::class, [
                'label' => 'Description du produit',
                'attr' => [
                    // le placeholder est un attribut HTML
                    'placeholder' => 'ex. Un pain au chocolat vegan',
                ]
            ])

            ->add('picture', UrlType::class, [
                'label' => "Photo du produit",
                'attr' => [
                    'placeholder' => 'https://picsum.photos/450/300?image=249'
                ]
            ])

            ->add('category', EntityType::class, [
                // l'entité associé à ce champ
                'class' => Category::class,
                // la propriété de l'entité à afficher dans le choix
                'choice_label' => 'name',
                // les categorie sont un tableau donc array !
                'multiple' => false,
                // on ne veut pas de checkboxes
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
