<?php

namespace App\Form;

use App\Entity\Ingredient;
use App\Entity\Recette;
use App\Entity\UniteDeMesure;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddIngredientsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('thumbnail')
            ->add('recettes', EntityType::class, [
                'class' => Recette::class,
                'choice_label' => 'nom',
                'multiple' => true,
            ])
            ->add('uniteDeMesure', EntityType::class, [
                'class' => UniteDeMesure::class,
                'choice_label' => 'nom',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ingredient::class,
        ]);
    }
}