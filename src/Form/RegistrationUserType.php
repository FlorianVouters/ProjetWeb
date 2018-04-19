<?php
// /src/Form/RegistrationUserTypetionUserType.php
namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, array('label' => 'Prénom'))
            ->add('surname', TextType::class, array('label' => 'Nom'))
            ->add('email', EmailType::class, array('label' => 'Email'))
            ->add('password', RepeatedType::class, array(
                                'type' => PasswordType::class,
                                'first_options'  => array('label' => 'Votre Mot de Passe'),
                                'second_options' => array('label' => 'Répétez votre mot de passe'),
                    ))
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }
}