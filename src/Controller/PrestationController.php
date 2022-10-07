<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Prestations;
use App\Form\PrestationType;


class PrestationController extends AbstractController
{
    /**
     * @Route("/prestation", name="app_prestation")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $repo = $this->getDoctrine()->getRepository(Prestations::class);

        $prestations = $repo->findAll();

        return $this->render('prestation/index.html.twig', [
            'controller_name' => 'PrestationController',
            'Prestations' => $prestations
        ]);
    }

    /**
     * @Route("/ajout-prestation", name="app_ajout_prestation")
     */
    public function ajoutPrestation(Request $request, EntityManagerInterface $entityManager): Response
    {
        $repo = $this->getDoctrine()->getRepository(Prestations::class);

        $prestations = $repo->findAll();

        $Prestation = new Prestations();
        $form = $this->createForm(PrestationType::class,$Prestation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($Prestation);
            $entityManager->flush();

            $this->addFlash('success', 'Une prestation a été ajouté récemment !');
            return $this->redirectToRoute('app_prestation');
        }

        return $this->render('prestation/index.html.twig', [
            'controller_name' => 'PrestationController',
            'Prestations' => $prestations,
            'PrestationType' => $form->createView()
        ]);
    }
}
