<?php
/**
 * Created by PhpStorm.
 * User: Gianni GIUDICE
 * Date: 09/12/2019
 * Time: 11:05
 */

namespace App\Controller;


use App\Services\ReignsAPI;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EndController extends AbstractController {
    /**
     * @Route("/ends/", name="end_home")
     */
    public function index(ReignsAPI $reignsAPI) {
        $ends = $reignsAPI->getComponent('ends');
        return $this->render('authenticated/end/index.html.twig', [
            'ends' => $ends,
            'type' => 'fin'
        ]);
    }
}