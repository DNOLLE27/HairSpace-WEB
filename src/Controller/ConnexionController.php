<?php

namespace App\Controller;

use App\Entity\Droits;
use App\Entity\Utilisateurs;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConnexionController extends AbstractController
{
    /**
     * @Route("/connexion", name="app_connexion")
     */
    public function index(): Response
    {
        $Ut = $this->getDoctrine()->getRepository(Utilisateurs::class);

        $users = $Ut->findAll();

        $Dr = $this->getDoctrine()->getRepository(Droits::class);

        $droits = $Dr->findAll();
        return $this->render('connexion/index.html.twig', [
            'users' => $users,
            'droits' => $droits,
        ]);
    }

    
}
