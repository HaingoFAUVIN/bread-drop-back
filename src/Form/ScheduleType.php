<?php

namespace App\Form;

use App\Entity\Schedule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScheduleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('day', TextType::class, [
                'label' => 'Jour de la semaine',
                'attr' => [
                    // le placeholder est un attribut HTML
                    'placeholder' => 'ex. Lundi',
                ]
            ])
            
            ->add('openMorning')
            ->add('closeMorning')
            ->add('openAfternoon')
            ->add('closeAfternoon')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('bakery')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Schedule::class,
        ]);
    }
}
