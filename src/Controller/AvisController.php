<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Avis;
use App\Entity\Utilisateurs;

class AvisController extends AbstractController
{
    /**
     * @Route("/avis", name="app_avis")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Avis::class);

        $avis = $repo->findAll();

        $repo2 = $this->getDoctrine()->getRepository(Utilisateurs::class);

        $utilisateurs = $repo2->findAll();
        return $this->render('avis/index.html.twig', [
            'controller_name' => 'AvisController',
            'avis' => $avis,
            'utilisateurs' => $utilisateurs,
        ]);
    }
}
