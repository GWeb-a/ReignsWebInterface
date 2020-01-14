<?php
/**
 * Created by PhpStorm.
 * User: Gianni GIUDICE
 * Date: 09/12/2019
 * Time: 10:57
 */

namespace App\Controller;


use App\Services\ReignsAPI;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CharacterController extends AbstractController {
    /**
     * @Route("/characters/", name="character_home")
     */
    public function index(ReignsAPI $reignsAPI) {
        $characters = $reignsAPI->getComponent('characters');
        return $this->render('authenticated/character/index.html.twig', [
            'characters' => $characters,
            'type' => 'personnage'
        ]);
    }
}