<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $permissions = array(
            'ROLE_USER'     => 'Aucun droit',
            'ROLE_ADMIN'    => 'Consultation',
            'ROLE_CESI'     => 'Administrateur'
        );
        $builder
            ->add('username', TextType::class)
            ->add('firstname', TextType::class)
            ->add('surname', TextType::class)
            ->add('email', EmailType::class)
            ->add('roles', ChoiceType::class, array(
                'label'   => 'Choose the role',
                'choices' => array('bonjour', 'allo'),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
