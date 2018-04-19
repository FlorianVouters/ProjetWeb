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
            'Aucun droit'     => 'ROLE_INVITED',
            'Etudiant'     => 'ROLE_USER',
            'Membre CESI'    => 'ROLE_CESI',
            'Administrateur'     => 'ROLE_ADMIN'
        );
        $builder
            ->add('username', TextType::class, array("label" => "Pseudo"))
            ->add('firstname', TextType::class, array("label" => "Prénom"))
            ->add('surname', TextType::class, array("label" => "Nom"))
            ->add('email', EmailType::class, array("label" => "Email"))
            ->add('temp_roles', ChoiceType::class, array(
                'label'   => 'Choix du rôle',
                'choices' => $permissions,
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
