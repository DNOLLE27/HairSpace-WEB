<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Evenement;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Doctrine\ORM\EntityManagerInterface;

class EvenementController extends AbstractController
{
    #[Route('/evenement', name: 'app_evenement')]
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Evenement::class);

        $evenements = $repo->findAll();

        return $this->render('evenement/index.html.twig', [
            'controller_name' => 'EvenementController',
            'evenements' => $evenements
        ]);
    }

    /**
     * @Route("/ajout-evenement", name="app_ajout_evenement")
     */
    public function addEvenement(Request $request): Response
    {
       
            $even = new Evenement();
            date_default_timezone_set('Europe/Paris'); // heure de la france
            
            
            $form = $this->createFormBuilder($even)
                         ->add('nom_Evenement') 
                         ->add('description', TextareaType::class) 
                         ->add('lien_image')
                         ->add('offre_prevu')    
                         ->add('nb_place')    
                         ->getForm();
                         
            $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
 


            $even = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($even);
            $entityManager->flush();   // envoie vers base 
            return $this->redirectToRoute('app_evenement');
        }
                         
            return $this->render('evenement/ajout-evenement.html.twig', [
                'ajoutEvenement' => $form->createview(),    
            ]);
        }

    /**
      * @Route("/suppr-evenement", name="app_suppr_evenement") 
      */
    public function supprEvenement(Request $request, EntityManagerInterface $entityManager): Response
    {
        // if ($this->get('session')->get('Droit') == 1)
        // {
            $evenSuppr = $this->getDoctrine()->getRepository(Evenement::class)->find($_POST['idEvenSuppr']);

            $entityManager->remove($evenSuppr);
            $entityManager->flush();

            $this->addFlash('success', "L'évenement à bien été supprimé");
            return $this->redirectToRoute('app_evenement');
        // }
        // else
        // {
        //     return $this->redirectToRoute('app_evenement');
        // }
    }
}
