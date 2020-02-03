<?php
/**
 * Created by PhpStorm.
 * User: Gianni GIUDICE
 * Date: 03/02/2020
 * Time: 19:28
 */

namespace App\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class EndType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('name', TextType::class, ['attr' => ['placeholder' => 'Nom']])
            ->add('description', TextType::class, ['attr' => ['placeholder' => 'Nom']])
            ->add('img_address', TextType::class, ['attr' => ['placeholder' => 'Adresse de l\'image']])

            ->add('save', SubmitType::class, ['label' => 'Valider'])
        ;
    }
}