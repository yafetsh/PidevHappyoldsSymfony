<?php

namespace MaisonretraiteBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResidentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomResident')->add('prenomResident')->add('ageResident')->add('alzheimerResident')->add('maladieResident')->add('responsable')->add('telephoneResponsable')->add('maison', EntityType::class,array(
            'class'=>'MaisonretraiteBundle:Maison',
            'choice_label'=>'nom_maison',
            'multiple'=>false,
        ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MaisonretraiteBundle\Entity\Resident'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'maisonretraitebundle_resident';
    }


}
