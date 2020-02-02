<?php
/**
 * Created by PhpStorm.
 * User: Gianni GIUDICE
 * Date: 09/12/2019
 * Time: 11:11
 */

namespace App\Controller;


use App\Services\ReignsAPI;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ExtraController extends AbstractController {
    /**
     * @Route("/extra/", name="extra_home")
     */
    public function index(ReignsAPI $reignsAPI) {
        $jsonArray = [
            'name' => 'objecttest',
            'queryName' => 'objecttest',
            'description' => 'a simple object description',
            'effect' => [
                'religion' => 10,
                'army' => 20,
                'population' => 10,
                'argent' => 30
            ]
        ];
        //$reignsAPI->addComponent('objects', $jsonArray);
        $extras = $reignsAPI->getComponent('objects');
        return $this->render('authenticated/extra/index.html.twig', [
            'extras' => $extras,
            'type' => 'objet'
        ]);
    }
}