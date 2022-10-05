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
        $msgErrCo = "";

        $form = $this->createForm(ConnexionType::class);
        $form->handleRequest($request);

        $id =  $form->get('conx_identifiant')->getData();
        $mdp =  $form->get('conx_mdp')->getData();

        $repo = $this->getDoctrine()->getRepository(Utilisateurs::class);
        $Utilisateurs = $repo->findAll();
        
        if ($form->isSubmitted() && $form->isValid())
        {
            foreach ($Utilisateurs as $unUtilisateur)
            {
                if ($unUtilisateur->getUtlIdentifiant() == $id && $unUtilisateur->getUtlMdp() == $mdp)
                {
                    $this->get('session')->set('ID', $id);
                    $this->get('session')->set('Droit', $unUtilisateur->isDroits());

                    return $this->redirectToRoute('index');
                }
                else
                {
                    $msgErrCo = "Erreur, l'identifiant et le mot de passe saisis sont incorrects !";
                }
            }
        }

        return $this->render('connexion/index.html.twig', [
            'ConnexionType' => $form->createView(),
            'msgErreurCo' => $msgErrCo
        ]);
    }
}
