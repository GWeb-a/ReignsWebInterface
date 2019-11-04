<?php
/**
 * Created by PhpStorm.
 * User: Gianni GIUDICE
 * Date: 03/11/2019
 * Time: 23:02
 */

namespace App\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class LoginType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('username', TextType::class, ['attr' => ['placeholder' => 'Pseudo']])
            ->add('password', TextType::class, ['attr' => ['placeholder' => 'Mot de passe']])
            ->add('save', SubmitType::class, ['label' => 'Connexion'])
        ;
    }
}