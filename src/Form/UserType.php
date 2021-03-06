<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $user = $builder->getData();
        $builder
            ->add('email', TextType::class,[
                'label' => "Email"
            ]);
           
        if (is_null($user->getId())){
                $builder->add('password', RepeatedType::class,[
                    'type' => PasswordType::class,
                    'invalid_message'=>'Les mots de passe doivent être identiques',
                    'options' => ['attr' => ['class' => 'password-field']],
                    'required' => true,
                    'first_options' => ['label' => 'Mot de passe'],
                    'second_options' => ['label' => 'Confirmez le mot de passe']
                ]);
            }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
