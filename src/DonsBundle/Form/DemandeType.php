<?php

namespace DonsBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('idMaison',EntityType::class,array(
            'class' => 'MaisonretraiteBundle:Maison',
            'choice_label' => 'nomMaison',
            'label'=>'Nom maison',

            'multiple' => false,
        ))
            ->add('idDemandeCategorie', EntityType::class,array(
                'class' => 'DonsBundle:CategorieDemande',
                'choice_label' => 'nomCategorie',
                'multiple' => false,
                'label'=>'Nom Catégprie',

            ))
            ->add('quantiteDemande')
            ->add('descriptionDemande')


            ->add('ajouter',SubmitType::class);

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DonsBundle\Entity\Demande'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'donsbundle_demande';
    }


}
