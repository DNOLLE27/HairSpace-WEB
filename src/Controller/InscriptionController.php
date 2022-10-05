<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\InscriptionType;
use App\Entity\Utilisateurs;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="app_inscription")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
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

                $this->addFlash('success', 'test');
                return $this->redirectToRoute('app_contact');
            }
        }

        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
            'InscriptionType' => $form->createView()
        ]);
    }
}
