<?php

namespace MaisonretraiteBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResidentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $sexe = array(
            'Homme' => 'Homme',
            'Femme' => 'Femme'
        );
        $alzheimer = array(
            'Oui' => 'Oui',
            'Non' => 'Non'
        );
        $builder->add('nomResident',TextType::class,array('label'=>'Nom:'))
            ->add('prenomResident',TextType::class,array('label'=>'Prénom:'))
            ->add('ageResident')
            -> add('sexeResident',ChoiceType::class,array(
              'choices'=>$sexe,
'expanded'=>true,
                'label'=>'Sexe:'
            ))

            -> add('alzheimerResident',ChoiceType::class,array(
                'choices'=> $alzheimer,
                'expanded'=>true,
                'label'=>'Alzheimer'
            ))
            ->add('maladieResident',TextareaType::class,array('label'=>'Maladie:'))
            ->add('responsable',TextType::class,array('label'=>'Responsable:'))
            ->add('telephoneResponsable',TelType::class,array('label'  => 'Numero Telephone :   '))
            ->add('maison', EntityType::class,array(
            'class'=>'MaisonretraiteBundle:Maison',
            'choice_label'=>'nom_maison',
            'multiple'=>false,
                'label'  => 'Choisissez votre maison :   '
        ))->add('dateResident',DateType::class,array('disabled'=>'true'));
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
