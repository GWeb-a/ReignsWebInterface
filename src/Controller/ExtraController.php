<?php
/**
 * Created by PhpStorm.
 * User: Gianni GIUDICE
 * Date: 09/12/2019
 * Time: 11:11
 */

namespace App\Controller;


use App\Form\Type\ExtraType;
use App\Services\ReignsAPI;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ExtraController extends AbstractController {
    /**
     * @Route("/extra/", name="extra_home")
     */
    public function index(Request $request, ReignsAPI $reignsAPI) {
        $form = $this->createForm(ExtraType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $jsonArray = $reignsAPI->getJsonFormat('objects', $form->getData());
            $reignsAPI->addComponent('objects', $jsonArray);

            return $this->redirectToRoute('extra_home');
        }

        $extras = $reignsAPI->getComponent('objects');
        return $this->render('authenticated/extra/index.html.twig', [
            'extras' => $extras,
            'type' => 'objet',
            'form' => $form->createView()
        ]);
    }
}