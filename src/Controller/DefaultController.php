<?php

namespace App\Controller;

use App\Form\Type\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController {
    /**
     * @Route("/", name="default")
     */
    public function index() {
        $form = $this->createForm(LoginType::class, null);

        return $this->render('default/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
