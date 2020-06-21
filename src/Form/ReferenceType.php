<?php

namespace App\Form;

use App\Entity\Reference;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReferenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Formation',
                'attr' => [
                    'placeholder' => 'Entrez le nom de votre expérience pro ...',
                ]
            ])
            ->add('company', TextType::class, [
                'label' => 'Entreprise',
                'attr' => [
                    'placeholder' => 'Entrez le nom de l\'entreprise ...',
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description de l\'expérience pro',
                'attr' => [
                    'placeholder' => 'Entrez le description de votre expériences',
                ]
            ])
            ->add('startedAt', DateType::class, [
                'label' => 'Début',
                'input' => 'datetime_immutable',
                'widget' => 'single_text'
            ])
            ->add('endedAt', DateType::class, [
                'label' => 'Fin',
                'input' => 'datetime_immutable',
                'widget' => 'single_text',
                'required' => false
            ])
            ->add('medias', CollectionType::class, [
                'entry_type' => MediaType::class,
                'entry_options' => [
                    'label' => false,
                ],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reference::class,
        ]);
    }
}
