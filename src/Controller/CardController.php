<?php
/**
 * Created by PhpStorm.
 * User: Gianni GIUDICE
 * Date: 05/11/2019
 * Time: 08:51
 */

namespace App\Controller;

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
        $cards = $reignsAPI->getComponent('cards');

        return $this->render('authenticated/card/index.html.twig', [
            'cards' => $cards,
            'type' => 'carte'
        ]);
    }
}