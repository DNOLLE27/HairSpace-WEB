<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeconnexionController extends AbstractController
{
    /**
     * @Route("/deconnexion", name="app_deconnexion")
     */
    public function index(): Response
    {
        $this->get('session')->set('ID', "");
        $this->get('session')->set('Droit', "");
        return $this->render('index/index.html.twig', []);
    }
}
