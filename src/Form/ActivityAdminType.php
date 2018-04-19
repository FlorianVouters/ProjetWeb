<?php

namespace App\Form;

use App\Entity\Activity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActivityAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array("label" => "Nom"))
            ->add('description', TextareaType::class, array("label" => "Description"))
            ->add('date', DateType::class)
            ->add('currency', ChoiceType::class, array(
                                        'label' => "Récurrence de l'activité",
                                        'choices'  => array(
                                            'Oui' => true,
                                            'Non' => false,
                                            ),
                            ))
            ->add('price', MoneyType::class, array("label" => "Prix"))
            ->add('visibility', ChoiceType::class, array(
                                        'label' => "Visibilité de l'activité",
                                        'choices'  => array(
                                            'Oui' => true,
                                            'Non' => false,
                                            ),
                            ))

            ->add('statut', ChoiceType::class, array(
                                        'label' => "Activité ou Idée ?",
                                        'choices'  => array(
                                            'Activité' => true,
                                            'Idée' => false,
                                            ),
                            ))

            ->add('image', MediaType::class, array("label" => "Image"))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Activity::class,
        ]);
    }
}
