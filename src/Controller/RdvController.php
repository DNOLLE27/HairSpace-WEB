<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Rdv;
use App\Entity\Prestations;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use App\Form\RdvModif;

class RdvController extends AbstractController
{
    /**
     * @Route("/rdv", name="app_rdv_list")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Rdv::class);

        $rdv = $repo->findAll();

        $repo2 = $this->getDoctrine()->getRepository(Prestations::class);

        $prestation = $repo2->findAll();

        return $this->render('rdv/index.html.twig', [
            'controller_name' => 'RdvController',
            'rdv' => $rdv,
            'prestation' => $prestation,
        ]);  
    } 

    /**
     * @Route("/ajout-rdv", name="app_rdv_ajout")
     */
    public function add(Request $request): Response
    {
        // if ($this->get('session')->get('ID') != "")
        // {
            $rdv = new Rdv();
            date_default_timezone_set('Europe/Paris'); // heure de la france
            $date = new \DateTime('now'); // date du jour
            
            
            $form = $this->createFormBuilder($rdv)
                         ->add('nom_client')  
                         ->add('prenom_client')
                         ->add('plage_horaire')
                         ->add('date_rdv', 'datetime',
                         array(
                             'widget' => 'single_text',
                             'format' => 'yyyy-MM-dd  HH:mm:ii'
                         ))
                        //  ->add('prestation_id', TextareaType::class, ['attr' => ['rows' => 7,'cols' => 30, 'class' => 'avisC']])
                         ->getForm();
                         
            $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            // $user = new Utilisateurs();
            // $user = $this->getDoctrine()->getRepository(Utilisateurs::class)->find($this->get('session')->get('id'));


            $rdv = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rdv);
            $entityManager->flush();   // envoie vers base 
            return $this->redirectToRoute('app_rdv_list');
        }
        return $this->render('rdv/ajout.html.twig', [
            'ajoutRdv' => $form->createview(),    
        ]);
    }

    /**
     * @Route("/modif-rdv", name="app_rdv_modif")
     */
    public function edit(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($this->get('session')->get('Droit') == 1)
        {
            if (isset($_POST['idRdvModif']))
            {
                $this->get('session')->set('IDModif', $_POST['idRdvModif']);
            }
            $msgErrPrestaModif = "";

            $repo = $this->getDoctrine()->getRepository(Rdv::class);

            $rdvs = $repo->findAll();

            $rdvModif = $this->getDoctrine()->getRepository(Rdv::class)->find($this->get('session')->get('IDModif'));

        
        $form = $this->createForm(RdvModif::class);                  
        $form->handleRequest($request);

        if ($form->isSubmitted())
            {
                if ($form->isValid())
                {
                    if ($form->get('nom_client')->getData() != null)
                    {
                        $rdvModif->setNomClient($form->get('nom_client')->getData());
                    }
                    if ($form->get('prenom_client')->getData() != null)
                    {
                        $rdvModif->setPrenomClient($form->get('prenom_client')->getData());
                    }
                    if ($form->get('plage_horaire')->getData() != null)
                    {
                        $rdvModif->setPlageHoraire($form->get('plage_horaire')->getData());
                    }
                    if ($form->get('date_rdv')->getData() != null)
                    {
                        $rdvModif->setDateRdv($form->get('date_rdv')->getData());
                    }
                    if ($form->get('nom_client')->getData() == null && $form->get('prenom_client')->getData() == null && $form->get('plage_horaire')->getData() == null && $form->get('date_rdv')->getData() == null)
                    {
                        $this->addFlash('success', 'Aucune nouvelle donnée de saisi, le rdv n\'a donc pas été modifié !');
                        return $this->redirectToRoute('app_rdv_list');
                    }
                    else
                    {
                        $entityManager->flush();

                        $this->addFlash('success', 'Le rdv a été modifié récemment !');
                        return $this->redirectToRoute('app_rdv_list');
                    }  
                }
                else
                {
                    $msgErrPrestaModif = "Une ou plusieurs données sont incorrectes, veuillez les resaisir !";
                }
            }
            return $this->render('rdv/modif.html.twig', [
                'modifRdv' => $form->createView(),
                'rdvs' => $rdvs,
                'idModifRdv' => $this->get('session')->get('IDModif'),
                'MSGErrPrestaModif' => $msgErrPrestaModif
            ]);
        }
        else
        {
            return $this->redirectToRoute('app_rdv_list');
        }
    }

    /**
     * @Route("/suppr-rdv", name="app_rdv_suppr")
     */
    public function suppr(Request $request, EntityManagerInterface $entityManager): Response
    {
        // if ($this->get('session')->get('Droit') == 1)
        // {
            $test2Suppr = $this->getDoctrine()->getRepository(Rdv::class)->find($_POST['idRdvSuppr']);

            $entityManager->remove($test2Suppr);
            $entityManager->flush();

            $this->addFlash('success', 'Le rdv a été supprimé récemment !');
            return $this->redirectToRoute('app_rdv_list');
        // }
        // else
        // {
        //     return $this->redirectToRoute('app_avis');
        // }
    }
}
