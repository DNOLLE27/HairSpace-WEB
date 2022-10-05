<?php

namespace App\Controller;

use App\Entity\Utilisateurs;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Forms;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormView;
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

    /**
     * @Route("/inscription/new", name="inscription_create")
     */
    public function create(Request $request): Response
    {
    
        $user = new Utilisateurs();
        
        $form = $this->createFormBuilder($user)
                     ->add('id')
                     ->add('utl_identifiant')
                     ->add('utl_email')
                     ->add('utl_mdp')
                     ->getForm();
                     
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $user = $form->getData();
            return $this->redirectToRoute('task_success');
        }
                     
        return $this->render('inscription/index.html.twig', [
            'for' => $form->createview(),
     
        ]);

    }      
}