<?php
/**
 * Created by PhpStorm.
 * User: Gianni GIUDICE
 * Date: 05/11/2019
 * Time: 08:51
 */

namespace App\Controller;

use App\Form\Type\CardType;
use App\Services\ReignsAPI;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CardController
 * @package App\Controller
 * @IsGranted("ROLE_ADMIN")
 */

class CardController extends AbstractController {
    /**
     * @Route("/cards/", name="card_home")
     */
    public function index(ReignsAPI $reignsAPI) {
        $form = $this->createForm(CardType::class);

        $cards = [];
        //$cards = $reignsAPI->getComponent('cards');
        $jsonArray = [
            'name' => 'card_test',
            'queryName' => 'cardtest',
            'character' => 'card_test',
            'description' => 'a simple test',
            'yes' => 'Oui',
            'no' => 'Non',
            'effectgen' => [
                'religion' => 0,
                'army' => 0,
                'population' => 0,
                'argent' => 0
            ],
            'effectyes' => [
                'religion' => 0,
                'army' => 0,
                'population' => 0,
                'argent' => 10
            ],
            'effectno' => [
                'religion' => 0,
                'army' => 0,
                'population' => 0,
                'argent' => 0
            ],
            'condition' => [
                'religion' => 10,
                'army' => 0,
                'population' => 0,
                'argent' => 0
            ],
            'nextCard' => [
                'yes' => '',
                'no' => ''
            ]
        ];
        //$reignsAPI->addComponent('cards', $jsonArray);


        return $this->render('authenticated/card/index.html.twig', [
            'cards' => $cards,
            'type' => 'carte',
            'form' => $form->createView()
        ]);
    }
}