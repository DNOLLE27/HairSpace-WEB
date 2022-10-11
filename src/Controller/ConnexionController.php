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
        if ($this->get('session')->get('ID') == "" && $this->get('session')->get('Droit') == "")
        {
            $msgErrCo = "";

            $form = $this->createForm(ConnexionType::class);
            $form->handleRequest($request);

            $id =  $form->get('conx_identifiant')->getData();
            $mdp =  $form->get('conx_mdp')->getData();

            $repo = $this->getDoctrine()->getRepository(Utilisateurs::class);
            $Utilisateurs = $repo->findAll();

            $liste_noire = "/[]()~!#{};|<>=+";
            $verifValidID = strpbrk($id, $liste_noire);
            $verifValidMDP = strpbrk($mdp, $liste_noire);
            
            if ($form->isSubmitted() && $form->isValid())
            {
                if ($verifValidID === false && strlen($id) >= 4 && strlen($id) <= 15 && $verifValidMDP === false && strlen($mdp) >= 8 && strlen($mdp) <= 20)
                {
                    foreach ($Utilisateurs as $unUtilisateur)
                    {
                        if ($unUtilisateur->getUtlIdentifiant() == $id && password_verify($mdp, $unUtilisateur->getUtlMdp()) == true)
                        {
                            $this->get('session')->set('ID', $id);
                            $this->get('session')->set('Droit', $unUtilisateur->isDroits());
                            $this->get('session')->set('id', $unUtilisateur->getId());
                        
                            return $this->redirectToRoute('index');
                        }
                        else
                        {
                            $msgErrCo = "Erreur, l'identifiant et le mot de passe saisis sont incorrects !";
                        }
                    }
                }
                else
                {
                    $msgErrCo = "Erreur, les données saisie ne sont pas valides !";
                }
            }

            return $this->render('connexion/index.html.twig', [
                'ConnexionType' => $form->createView(),
                'msgErreurCo' => $msgErrCo
            ]);
        }
        else
        {
            return $this->redirectToRoute('index');
        }
    }
}
