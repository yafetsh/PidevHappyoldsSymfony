<?php

namespace PrestationsanteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FicheMedicaleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateCreationFiche')
            ->add('dateDermodifFiche')
            ->add('remarquesFiche')
            ->add('niveauTemp')
            ->add('niveauSec')
            ->add('niveauTension')
            ->add('groupeSanguin')
            ->add('medicaments')
            ->add('tailleResident')
            ->add('poidsResident')
            ->add('modify',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PrestationsanteBundle\Entity\FicheMedicale'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'prestationsantebundle_fichemedicale';
    }


}
