<?php

namespace App\Controller;

use App\Entity\Utilisateurs;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\InscriptionType;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="app_inscription")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($this->get('session')->get('ID') == "" && $this->get('session')->get('Droit') == "")
        {
            $msg_err = "";

            $utilisateur = new Utilisateurs();
            $form = $this->createForm(InscriptionType::class,$utilisateur );
            $form->handleRequest($request);

            $mdp =  $form->get('utl_mdp')->getData();
            $mdpVerif =  $form->get('utl_mdp_verif')->getData();

            if ($form->isSubmitted() && $form->isValid())
            {
                if ($mdp == $mdpVerif)
                {
                    $utilisateur->setDroits(0);
                    $entityManager->persist($utilisateur);
                    $entityManager->flush();

                    $this->addFlash('success', 'Compte créé, veuillez-vous connecter !');
                    return $this->redirectToRoute('app_connexion');
                }
                else
                {
                    $msg_err = "Erreur, les mots de passes saisis ne correspondent pas !";
                }
            }

            return $this->render('inscription/index.html.twig', [
                'controller_name' => 'InscriptionController',
                'InscriptionType' => $form->createView(),
                'msgErreur' => $msg_err
            ]);
        }
        else
        {
            return $this->redirectToRoute('index');
        }
    }
}