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
            $repo = $this->getDoctrine()->getRepository(Utilisateurs::class);
            $Utilisateurs = $repo->findAll();
            
            $IDTrouve = false;
            $EmailTrouve = false;
            $AdminTrouve = false;
            
            $msg_err = "";

            foreach ($Utilisateurs as $unUtilisateur)
            {
                if ($unUtilisateur->isDroits())
                {
                    $AdminTrouve = true;
                }
            }

            if (!$AdminTrouve)
            {
                $msg_admin = "Inscription de l'Administrateur !";
            }
            else
            {
                $msg_admin = "";
            }

            $utilisateur = new Utilisateurs();
            $form = $this->createForm(InscriptionType::class,$utilisateur );
            $form->handleRequest($request);

            $mdp =  $form->get('utl_mdp')->getData();
            $mdpVerif =  $form->get('utl_mdp_verif')->getData();
            $identifiant =  $form->get('utl_identifiant')->getData();
            $email =  $form->get('utl_email')->getData();

            $liste_noire = "/[]()~!#{};|<>=+";
            $verifValidID = strpbrk($identifiant, $liste_noire);
            $verifValidEmail = strpbrk($email, $liste_noire);
            $verifValidMDP = strpbrk($mdp, $liste_noire);

            if ($form->isSubmitted() && $form->isValid())
            {
                if ($mdp == $mdpVerif)
                {
                    foreach ($Utilisateurs as $unUtilisateur)
                    {
                        if ($unUtilisateur->getUtlIdentifiant() == $identifiant)
                        {
                            $IDTrouve = true;
                        }

                        if ($unUtilisateur->getUtlEmail() == $email)
                        {
                            $EmailTrouve = true;
                        }
                    }

                    if ($IDTrouve == false && $EmailTrouve == false)
                    {
                        if ($verifValidID === false && strlen($identifiant) >= 4 && strlen($identifiant) <= 15 && $verifValidEmail === false && strlen($email) >= 8 && strlen($email) <= 35 && $verifValidMDP === false && strlen($mdp) >= 8 && strlen($mdp) <= 20)
                        {
                            $temps = 0.1;
                            $cost = 10;
                        
                            do
                            {
                                $debut = microtime(true);
                                password_hash($mdp, PASSWORD_DEFAULT, ['cost' => $cost]);
                                $fin = microtime(true);
                                $cost++;
                            }
                            while (($fin - $debut) < $temps);
                        
                            $mdpCrypte = password_hash($mdp, PASSWORD_DEFAULT, ['cost' => $cost]);

                            if ($AdminTrouve)
                            {
                                $utilisateur->setDroits(0);
                            }
                            else
                            {
                                $utilisateur->setDroits(1);
                            }
                            
                            $utilisateur->setUtlMdp($mdpCrypte);
                            $entityManager->persist($utilisateur);
                            $entityManager->flush();

                            $this->addFlash('success', 'Compte créé, veuillez-vous connecter !');
                            return $this->redirectToRoute('app_connexion');
                        }
                        else
                        {
                            $msg_err = "Erreur, les données saisie ne sont pas valides !";
                        }
                    }
                    else
                    {
                        $msg_err = "Erreur, les données saisie (adresse e-mail ou identifiant) correspondent déjà à un utilsateur existant !";
                    }
                }
                else
                {
                    $msg_err = "Erreur, les mots de passes saisis ne correspondent pas !";
                }
            }

            return $this->render('inscription/index.html.twig', [
                'controller_name' => 'InscriptionController',
                'InscriptionType' => $form->createView(),
                'msgErreur' => $msg_err,
                'msgAdmin' => $msg_admin
            ]);
        }
        else
        {
            return $this->redirectToRoute('index');
        }
    }
}