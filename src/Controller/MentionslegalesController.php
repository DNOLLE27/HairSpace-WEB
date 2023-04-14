<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Identite;

use Symfony\Component\Form\Extension\Core\Type\TextType;

class MentionslegalesController extends AbstractController
{
    #[Route('/mentionslegales', name: 'app_mentionslegales')]
    public function edit(Request $request): Response
    {

        $repo = new Identite();
        $repo = $this->getDoctrine()->getRepository(Identite::class);
        $iden = $repo->findAll();

        $identite = new Identite();
        $laIdentite = $this->getDoctrine()->getRepository(Identite::class)->find(1);
            
        $form = $this->createFormBuilder($laIdentite)
                        ->add('nomIdentite', TextType::class, ['attr' => ['class' => 'ml']])
                        ->add('adresse', TextType::class, ['attr' => ['class' => 'ml']])
                        ->add('proprietaire', TextType::class, ['attr' => ['class' => 'ml']])
                        ->add('responsable', TextType::class, ['attr' => ['class' => 'ml']])
                        ->add('concepteur', TextType::class, ['attr' => ['class' => 'ml']])
                        ->add('animateur', TextType::class, ['attr' => ['class' => 'ml']])
                        ->add('hebergeur', TextType::class, ['attr' => ['class' => 'ml']])
                        ->getForm();
                         
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();
            return $this->render('mentionslegales/index.html.twig', [
                'modifMention' => $form->createview(),
                'mentions' => $iden,
            ]);
        } else {
            return $this->render('mentionslegales/index.html.twig', [
                'modifMention' => $form->createview(),
                'mentions' => $iden,
            ]);
        }
    }
}
