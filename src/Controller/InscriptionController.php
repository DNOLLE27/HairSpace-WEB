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

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="app_inscription")
     */
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
