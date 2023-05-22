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

            ->add('openMorning', TextType::class, [
                'label' => 'Heure d\'ouverture du matin',
                'attr' => [
                    // le placeholder est un attribut HTML
                    'placeholder' => '07',
                ]
            ])
            ->add('closeMorning', TextType::class, [
                'label' => 'Heure de fermeture du matin',
                'attr' => [
                    // le placeholder est un attribut HTML
                    'placeholder' => '12',
                ]
            ])

            ->add('openAfternoon', TextType::class, [
                'label' => 'Heure d\'ouverture de l\'apres midi',
                'attr' => [
                    // le placeholder est un attribut HTML
                    'placeholder' => '13',
                ]
            ])

            ->add('closeAfternoon', TextType::class, [
                'label' => 'Heure de fermeture de l\'apres midi',
                'attr' => [
                    // le placeholder est un attribut HTML
                    'placeholder' => '18',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Schedule::class,
        ]);
    }
}
