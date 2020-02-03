<?php
/**
 * Created by PhpStorm.
 * User: Gianni GIUDICE
 * Date: 02/02/2020
 * Time: 22:56
 */

namespace App\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class CardType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('name', TextType::class, ['attr' => ['placeholder' => 'Nom']])
            ->add('description', TextType::class, ['attr' => ['placeholder' => 'Nom']])
            ->add('yes', TextType::class, ['attr' => ['placeholder' => 'Valeur réponse oui']])
            ->add('no', TextType::class, ['attr' => ['placeholder' => 'Valeur réponse non']])

            ->add('effectgen_religion', NumberType::class, ['label' => 'Effet général religion'])
            ->add('effectgen_army', NumberType::class, ['label' => 'Effet général armée'])
            ->add('effectgen_population', NumberType::class, ['label' => 'Effet général population'])
            ->add('effectgen_money', NumberType::class, ['label' => 'Effet général argent'])

            ->add('effectyes_religion', NumberType::class, ['label' => 'Effet après réponse oui religion'])
            ->add('effectyes_army', NumberType::class, ['label' => 'Effet après réponse oui armée'])
            ->add('effectyes_population', NumberType::class, ['label' => 'Effet après réponse oui population'])
            ->add('effectyes_money', NumberType::class, ['label' => 'Effet après réponse oui argent'])

            ->add('effectno_religion', NumberType::class, ['label' => 'Effet après réponse non religion'])
            ->add('effectno_army', NumberType::class, ['label' => 'Effet après réponse non armée'])
            ->add('effectno_population', NumberType::class, ['label' => 'Effet après réponse non population'])
            ->add('effectno_money', NumberType::class, ['label' => 'Effet après réponse non argent'])

            ->add('condition_religion', NumberType::class, ['label' => 'Condition religion'])
            ->add('condition_army', NumberType::class, ['label' => 'Condition armée'])
            ->add('condition_population', NumberType::class, ['label' => 'Condition population'])
            ->add('condition_money', NumberType::class, ['label' => 'Condition argent'])

            ->add('next_card_yes', TextType::class, ['attr' => ['placeholder' => 'Prochaine carte si réponse oui']])
            ->add('next_card_no', TextType::class, ['attr' => ['placeholder' => 'Prochaine carte si réponse non']])

            ->add('save', SubmitType::class, ['label' => 'Valider'])
        ;
    }
}