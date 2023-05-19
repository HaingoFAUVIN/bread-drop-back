<?php

namespace App\Form;

use App\Entity\Bakery;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BakeryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de la Boulangerie',
                'attr' => [
                    // le placeholder est un attribut HTML
                    'placeholder' => 'ex. Au bon pain',
                ]
            ])
            ->add('adress')
            ->add('phone')
            ->add('picture')
            ->add('distance')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bakery::class,
        ]);
    }
}
