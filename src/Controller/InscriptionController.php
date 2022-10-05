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
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
<<<<<<< HEAD
use Symfony\Component\Form\FormView;
=======
use App\Form\InscriptionType;
use App\Entity\Utilisateurs;
>>>>>>> feature_damien

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="app_inscription")
     */
<<<<<<< HEAD
    public function index(Request $request, EntityManagerInterface $manager): Response
    {
        $user = new Utilisateurs();
            
            $form = $this->createFormBuilder($user)
                         ->add('utl_identifiant', TextType::class, [
                            'attr' => [ 
                                'placeholder' => "Identifiant",
                                'class' => 'tbMailI'
                            ]
                         ])
                         ->add('utl_email', EmailType::class, [
                            'attr' => [ 
                                'placeholder' => "Adresse email",
                                'class' => 'tbMdpI'
                            ]
                         ])
                         ->add('utl_mdp', PasswordType::class, [
                            'attr' => [ 
                                'placeholder' => "Mot de passe",
                                'class' => 'tbMdpSI'
                            ]
                         ])
                         ->getForm();
                             
            $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $user->setDroits(0);   

            $manager->persist($user);
            $manager->flush();
        }
        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
            'formUtilisateur' => $form->createview(),
=======
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
>>>>>>> feature_damien
        ]);
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
