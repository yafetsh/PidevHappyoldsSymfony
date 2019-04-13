<?php

namespace ActionBenevolatBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ActionBenevoleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateDAction')
            ->add('dateFAction')
            ->add('description')
            ->add('etat',ChoiceType::class,['choices' => [
        'valide' => true,
        'invalide' => false],])
            ->add('type',EntityType::class, array('class'=>'ActionBenevolatBundle:type',
            'choice_label'=>'categorie',
            'multiple'=>false,));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ActionBenevolatBundle\Entity\ActionBenevole'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'actionbenevolatbundle_actionbenevole';
    }


}
