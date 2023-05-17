<?php

namespace App\Form;

use App\Entity\Bakery;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BakeryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('adress')
            ->add('phone')
            ->add('picture')
            ->add('distance')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('product')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bakery::class,
        ]);
    }
}
