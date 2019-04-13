<?php

namespace EventBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SponsorEvenementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomSponsor')->add('prenomSponsor')->add('adresseSponsor')->add('telSponsor')->add('descriptionSponsoring')->add('evenementId',EntityType::class,array(
        //query choices from this entity
        'class' => 'EventBundle:Evenement' ,
        //use the User.uername property as the visible option
        'choice_label' => 'nomEvenement' ,
        //used ti render a select ox
        'multiple' => false,
    ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EventBundle\Entity\SponsorEvenement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'eventbundle_sponsorevenement';
    }


}
