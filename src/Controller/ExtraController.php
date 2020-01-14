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
        $extras = $reignsAPI->getComponent('objects');
        return $this->render('authenticated/extra/index.html.twig', [
            'extras' => $extras,
            'type' => 'objet'
        ]);
    }
}