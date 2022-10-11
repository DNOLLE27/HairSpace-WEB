<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Avis;
use App\Entity\Utilisateurs;

class AvisController extends AbstractController
{
    /**
     * @Route("/avis", name="app_avis")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Avis::class);

        $avis = $repo->findAll();

        $repo2 = $this->getDoctrine()->getRepository(Utilisateurs::class);

        $utilisateurs = $repo2->findAll();
        return $this->render('avis/index.html.twig', [
            'controller_name' => 'AvisController',
            'avis' => $avis,
            'utilisateurs' => $utilisateurs,
        ]);

        
    }

    /**
     * @Route("/suppr-avis", name="app_suppr_avis")
     */
    public function supprprestation(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($this->get('session')->get('Droit') == 1)
        {
            $avisSuppr = $this->getDoctrine()->getRepository(Avis::class)->find($_POST['idAvisSuppr']);

            $entityManager->remove($avisSuppr);
            $entityManager->flush();

            $this->addFlash('success', 'Le commentaire a été supprimé récemment !');
            return $this->redirectToRoute('app_avis');
        }
        else
        {
            return $this->redirectToRoute('app_avis');
        }
    }


    
}
