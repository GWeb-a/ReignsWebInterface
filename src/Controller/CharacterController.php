<?php
/**
 * Created by PhpStorm.
 * User: Gianni GIUDICE
 * Date: 09/12/2019
 * Time: 10:57
 */

namespace App\Controller;


use App\Form\Type\CharacterType;
use App\Services\ReignsAPI;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CharacterController extends AbstractController {
    /**
     * @Route("/characters/", name="character_home")
     */
    public function index(Request $request, ReignsAPI $reignsAPI) {
        $form = $this->createForm(CharacterType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $jsonArray = $reignsAPI->getJsonFormat('characters', $form->getData());
            $reignsAPI->addComponent('characters', $jsonArray);

            return $this->redirectToRoute('character_home');
        }

        $characters = $reignsAPI->getComponent('characters');
        return $this->render('authenticated/character/index.html.twig', [
            'characters' => $characters,
            'type' => 'personnage', 
            'form' => $form->createView()
        ]);
    }
}