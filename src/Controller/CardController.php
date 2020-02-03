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
use Symfony\Component\HttpFoundation\Request;
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
    public function index(Request $request, ReignsAPI $reignsAPI) {
        $form = $this->createForm(CardType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $jsonArray = $reignsAPI->getJsonFormat('cards', $form->getData());
            $reignsAPI->addComponent('cards', $jsonArray);

            return $this->redirectToRoute('card_home');
        }

        $cards = $reignsAPI->getComponent('cards');


        return $this->render('authenticated/card/index.html.twig', [
            'cards' => $cards,
            'type' => 'carte',
            'form' => $form->createView()
        ]);
    }
}