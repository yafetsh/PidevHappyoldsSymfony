<?php

namespace ActiviteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class ActiviteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomActivite')->add('dateActivite')->add('descriptionActivite')->add('animateur',EntityType::class, array(

            'class' => 'ActiviteBundle:Animateur',
            'choice_label' => 'nom_animateur',
            'multiple' => false,

        ))->add('categorieActivite',EntityType::class, array(

        'class' => 'ActiviteBundle:CategorieActivite',
        'choice_label' => 'type',
        'multiple' => false,

    ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ActiviteBundle\Entity\Activite'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'activitebundle_activite';
    }


}