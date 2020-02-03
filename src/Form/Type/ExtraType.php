<?php
/**
 * Created by PhpStorm.
 * User: Gianni GIUDICE
 * Date: 03/02/2020
 * Time: 19:35
 */

namespace App\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;

class ExtraType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('name', TextType::class, ['attr' => ['placeholder' => 'Nom']])
            ->add('description', TextType::class, ['attr' => ['placeholder' => 'Nom']])
            ->add('effect_religion', NumberType::class, ['label' => 'Effet religion'])
            ->add('effect_army', NumberType::class, ['label' => 'Effet armée'])
            ->add('effect_population', NumberType::class, ['label' => 'Effet population'])
            ->add('effect_money', NumberType::class, ['label' => 'Effet argent'])

            ->add('save', SubmitType::class, ['label' => 'Valider'])
        ;
    }
}