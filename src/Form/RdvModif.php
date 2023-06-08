<?php

namespace App\Form;

use App\Entity\Rdv;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RdvModif extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom_client')  
        ->add('prenom_client')
        ->add('plage_horaire')
        ->add('date_rdv', TimeType::class);
       //  ->add('prestation_id', TextareaType::class, ['attr' => ['rows' => 7,'cols' => 30, 'class' => 'avisC']])
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rdv::class,
        ]);
    }
}
