<?php

namespace App\Form;

use App\Entity\Bakery;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BakeryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de la boulangerie',
                'attr' => [
                    // le placeholder est un attribut HTML
                    'placeholder' => 'ex. Au bon pain',
                ]
            ])

            ->add('adress', TextType::class, [
                'label' => 'Adresse de la boulangerie',
                'attr' => [
                    // le placeholder est un attribut HTML
                    'placeholder' => '40 rue du pain 75000 Paris',
                ]
            ])

            ->add('phone', IntegerType::class, [
                'label' => 'Numero de téléphone',
                'attr' => [
                    // le placeholder est un attribut HTML
                    'placeholder' => 'ex. 0692245445',
                ]
            ])

            ->add('picture', UrlType::class, [
                'label' => "Photo de la boulangerie",
                'attr' => [
                    'placeholder' => 'https://picsum.photos/450/300?image=249'
                ]
            ])
            ->add('distance', IntegerType::class, [
                'label' => 'Distance de livraison',
                'attr' => [
                    // le placeholder est un attribut HTML
                    'placeholder' => '5',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bakery::class,
        ]);
    }
}
