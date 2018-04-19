<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class , array('label' => 'Nom de produit'))
            ->add('description', TextareaType::class, array('label' => 'Description du produit'))
            ->add('price', MoneyType::class, array('label' => 'Prix'))
            ->add('image', MediaType::class, array('label' => 'Image du produit'))
            ->add('category_id', EntityType::class, array(
                                        'class' => Category::class,
                                        'choice_label' => function($category) {
                                                    return $category->getName();
                                                    }
                                                    ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
