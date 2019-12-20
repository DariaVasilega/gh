<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('email')
            ->add('age')
            ->add('favoriteUsers')
            ->add('favoriteProducts')
            ->add('target', ChoiceType::class, [
                'choices'  => [
                    'F' => true,
                    'M' => false,
                ],
            ])
//            ->add('gender', 'choice', array(
//        'choices'   => array('m' => 'Male', 'f' => 'Female'),
//        'required'  => false,
//    ));
         ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
