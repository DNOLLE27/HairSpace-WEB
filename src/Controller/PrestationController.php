<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Prestations;
use App\Form\PrestationType;
use App\Form\PrestationModifType;


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
        if ($this->get('session')->get('Droit') == 1)
        {
            $repo = $this->getDoctrine()->getRepository(Prestations::class);

            $prestations = $repo->findAll();

            $Prestation = new Prestations();
            $form = $this->createForm(PrestationType::class,$Prestation);
            $form->handleRequest($request);

            $msgErrPresta = "";

            if ($form->isSubmitted()){
                if ($form->isValid())
                {
                    $entityManager->persist($Prestation);
                    $entityManager->flush();

                    $this->addFlash('success', 'Une prestation a été ajouté récemment !');
                    return $this->redirectToRoute('app_prestation');
                }
                else
                {
                    $msgErrPresta = "Une ou plusieurs données sont incorrectes, veuillez les resaisir !";
                }
            }

            return $this->render('prestation/index.html.twig', [
                'controller_name' => 'PrestationController',
                'Prestations' => $prestations,
                'PrestationType' => $form->createView(),
                'MSGErrPresta' => $msgErrPresta
            ]);
        }
        else
        {
            return $this->redirectToRoute('app_prestation');
        }
    }

    
    /**
     * @Route("/modif-prestation", name="app_modif_prestation")
     */
    public function modifprestation(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($this->get('session')->get('Droit') == 1)
        {
            if (isset($_POST['idPrestaModif']))
            {
                $this->get('session')->set('IDModif', $_POST['idPrestaModif']);
            }

            $msgErrPrestaModif = "";

            $repo = $this->getDoctrine()->getRepository(Prestations::class);

            $prestations = $repo->findAll();

            $prestationModif = $this->getDoctrine()->getRepository(Prestations::class)->find($this->get('session')->get('IDModif'));

            $form = $this->createForm(PrestationModifType::class);
            $form->handleRequest($request);

            if ($form->isSubmitted())
            {
                if ($form->isValid())
                {
                    if ($form->get('prs_image')->getData() != null)
                    {
                        $prestationModif->setPrsImage($form->get('prs_image')->getData());
                    }

                    if ($form->get('prs_prix')->getData() != null)
                    {
                        $prestationModif->setPrsPrix($form->get('prs_prix')->getData());
                    }

                    if ($form->get('prs_duree')->getData() != null)
                    {
                        $prestationModif->setPrsDuree($form->get('prs_duree')->getData());
                    }

                    if ($form->get('prs_libelle')->getData() != null)
                    {
                        $prestationModif->setPrsLibelle($form->get('prs_libelle')->getData());
                    }

                    if ($form->get('prs_image')->getData() == null && $form->get('prs_prix')->getData() == null && $form->get('prs_duree')->getData() == null && $form->get('prs_libelle')->getData() == null)
                    {
                        $this->addFlash('success', 'Aucune nouvelle donnée de saisi, la prestation n\'a donc pas été modifié !');
                        return $this->redirectToRoute('app_prestation');
                    }
                    else
                    {
                        $entityManager->flush();

                        $this->addFlash('success', 'Une prestation a été modifié récemment !');
                        return $this->redirectToRoute('app_prestation');
                    }    
                }
                else
                {
                    $msgErrPrestaModif = "Une ou plusieurs données sont incorrectes, veuillez les resaisir !";
                }
            }

            return $this->render('prestation/index.html.twig', [
                'controller_name' => 'PrestationController',
                'Prestations' => $prestations,
                'idModifPresta' => $this->get('session')->get('IDModif'),
                'PrestationTypeModif' => $form->createView(),
                'MSGErrPrestaModif' => $msgErrPrestaModif
            ]);
        }
        else
        {
            return $this->redirectToRoute('app_prestation');
        }
    }

    /**
     * @Route("/suppr-prestation", name="app_suppr_prestation")
     */
    public function supprprestation(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($this->get('session')->get('Droit') == 1)
        {
            $prestationSuppr = $this->getDoctrine()->getRepository(Prestations::class)->find($_POST['idPrestaSuppr']);

            $entityManager->remove($prestationSuppr);
            $entityManager->flush();

            $this->addFlash('success', 'Une prestation a été supprimé récemment !');
            return $this->redirectToRoute('app_prestation');
        }
        else
        {
            return $this->redirectToRoute('app_prestation');
        }
    }
}
