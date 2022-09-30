<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Prestations;

class PrestationController extends AbstractController
{
    /**
     * @Route("/prestation", name="app_prestation")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Prestations::class);

        $prestations = $repo->findAll();

        return $this->render('prestation/index.html.twig', [
            'controller_name' => 'PrestationController',
            'Prestations' => $prestations
        ]);
    }
}
