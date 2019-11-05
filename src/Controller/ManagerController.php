<?php
/**
 * Created by PhpStorm.
 * User: Gianni GIUDICE
 * Date: 05/11/2019
 * Time: 08:51
 */

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ManagerController
 * @package App\Controller
 * @IsGranted("ROLE_ADMIN")
 */

class ManagerController extends AbstractController {
    /**
     * @Route("/manager/", name="manager_home")
     */
    public function index() {
        return $this->render('manager/index.html.twig', [

        ]);
    }
}