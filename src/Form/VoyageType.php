<?php

namespace App\Form;

use App\Entity\Destination;
use App\Entity\Voyage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoyageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('DateVoyage')
            ->add('note')
            ->add('description')
            ->add('titre')
            ->add('photoFile', FileType::class,[
                'mapped' => false,
                'multiple'=> true,
                'required' => false
            ])
            ->add('Destination', EntityType::class,[
                 'class' => Destination::class,
                 'choice_label' => 'ville'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Voyage::class,
        ]);
    }
}
