<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Avis;
use App\Entity\Utilisateurs;

class CommentaireController extends AbstractController
{
    /**
     * @Route("/commentaire", name="app_commentaire")
     */
    public function index(Request $request): Response
    {
            
            $avis = new Avis();
            
            
            $form = $this->createFormBuilder($avis)
                         ->add('avs_commentaire')
                         ->getForm();
                         
            $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $avis = $form->getData();
            $avis->setAvsDate(new \DateTime());
            $avis->setAvsUtlNum(new Utilisateurs());
            return $this->redirectToRoute('app_avis');
        }
                         
            return $this->render('commentaire/index.html.twig', [
                'ajoutAvis' => $form->createview(),
         
            ]);

        }
}
