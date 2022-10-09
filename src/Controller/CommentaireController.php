<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use App\Entity\Avis;
use App\Entity\Utilisateurs;
use Symfony\Component\Validator\Constraints as Assert;

class CommentaireController extends AbstractController
{
    /**
     * @Route("/commentaire", name="app_commentaire")
     */
    public function index(Request $request): Response
    {
        if ($this->get('session')->get('Droit') != "")
        {
            $avis = new Avis();
            date_default_timezone_set('Europe/Paris');
            $aff = new \DateTime('now');
            
            
            $form = $this->createFormBuilder($avis)
                         ->add('avs_commentaire', TextareaType::class, ['attr' => ['rows' => 7,'cols' => 30]])
                         ->getForm();
                         
            $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $user = new Utilisateurs();
            $user = $this->getDoctrine()->getRepository(Utilisateurs::class)->find($this->get('session')->get('id'));


            $avis = $form->getData();
            $avis->setAvsDate($aff);
            $avis->setAvsUtlNum($user);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($avis);
            $entityManager->flush();
            return $this->redirectToRoute('app_avis');
        }
                         
            return $this->render('commentaire/index.html.twig', [
                'ajoutAvis' => $form->createview(),
         
            ]);

        }
        else{
            return $this->redirectToRoute('app_connexion');
        }

    }
           
}
