<?php
/**
 * Created by PhpStorm.
 * User: Gianni GIUDICE
 * Date: 09/12/2019
 * Time: 11:05
 */

namespace App\Controller;


use App\Form\Type\EndType;
use App\Services\ReignsAPI;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EndController extends AbstractController {
    /**
     * @Route("/ends/", name="end_home")
     */
    public function index(Request $request, ReignsAPI $reignsAPI) {
        $form = $this->createForm(EndType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $jsonArray = $reignsAPI->getJsonFormat('ends', $form->getData());
            $reignsAPI->addComponent('ends', $jsonArray);

            return $this->redirectToRoute('end_home');
        }
        $ends = $reignsAPI->getComponent('ends');
        return $this->render('authenticated/end/index.html.twig', [
            'ends' => $ends,
            'type' => 'fin',
            'form' => $form->createView()
        ]);
    }
}