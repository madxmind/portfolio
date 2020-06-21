<?php

namespace App\Form;

use App\Entity\Formation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Formation',
                'attr' => [
                    'placeholder' => 'Entrez le nom de la formation ...',
                ]
            ])
            ->add('school', TextType::class, [
                'label' => 'Ecole',
                'attr' => [
                    'placeholder' => 'Entrez le nom de l\'école ...',
                ]
            ])
            ->add('gradeLevel', ChoiceType::class, [
                'label' => 'Niveau d\'étude',
                'choices' => [
                    'Bac' => 0,
                    'Bac+1' => 1,
                    'Bac+2' => 2,
                    'Bac+3' => 3,
                    'Bac+4' => 4,
                    'Bac+5' => 5,
                    'Bac+8' => 8,
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => [
                    'placeholder' => 'Entrez le description de la formation',
                ]
            ])
            ->add('startedAt', DateType::class, [
                'label' => 'Début de la formation',
                'input' => 'datetime_immutable',
                'widget' => 'single_text'
            ])
            ->add('endedAt', DateType::class, [
                'label' => 'Fin de la formation',
                'input' => 'datetime_immutable',
                'widget' => 'single_text',
                'required' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}
