<?php

namespace App\Controller;

use App\Entity\Utilisateurs;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ConnexionType;

class ConnexionController extends AbstractController
{
    /**
     * @Route("/connexion", name="app_connexion")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ConnexionType::class);
        $form->handleRequest($request);

        $id =  $form->get('conx_identifiant')->getData();
        $mdp =  $form->get('conx_mdp')->getData();

        echo $id.$mdp;

        return $this->render('connexion/index.html.twig', [
            'ConnexionType' => $form->createView()
        ]);
    }

    
}
