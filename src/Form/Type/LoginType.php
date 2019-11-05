<?php
/**
 * Created by PhpStorm.
 * User: Gianni GIUDICE
 * Date: 03/11/2019
 * Time: 23:02
 */

namespace App\Form\Type;


use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class LoginType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('email', EmailType::class, ['attr' => ['placeholder' => 'Email']])
            ->add('password', PasswordType::class, ['attr' => ['placeholder' => 'Mot de passe']])
            ->add('save', SubmitType::class, ['label' => 'Connexion'])
        ;
    }
}