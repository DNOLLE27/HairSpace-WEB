<?php

namespace App\Form;

use App\Entity\Prestations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PrestationModifType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prs_image', TextType::class, array(
                'required' => false
            ))
            ->add('prs_prix', NumberType::class, array(
                'required' => false
            ))
            ->add('prs_duree', TimeType::class, array(
                'input'  => 'datetime',
                'widget' => 'choice',
                'required' => false,
                'by_reference' => true
            ))
            ->add('prs_libelle', TextType::class, array(
                'required' => false
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prestations::class,
        ]);
    }
}
