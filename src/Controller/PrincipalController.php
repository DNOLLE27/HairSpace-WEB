<?php

namespace App\Controller;

use App\Entity\Droits;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrincipalController extends AbstractController
{

    
    /**
     * @Route("/index", name="app_principal")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
    //$repo = $this->getDoctrine()->getRepository(Droits::class);
        $droits = $this->$doctrine->getRepository(Droits::class)->findAll();
        return $this->render('principal/index.html.twig', [
            'controller_name' => 'PrincipalController',
            'droits' => $droits,
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('principal/index.html.twig', [
            'controller_name' => 'PrincipalController',
        ]);
    }


    

    
}


