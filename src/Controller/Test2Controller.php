<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Test2;
use App\Entity\Niveau;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\Test2Modif;

class Test2Controller extends AbstractController
{

   /**
     * @Route("/test2", name="app_test2")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Test2::class);

        $test2 = $repo->findAll();

        $repo2 = $this->getDoctrine()->getRepository(Niveau::class);

        $niveau = $repo2->findAll();

        return $this->render('test2/index.html.twig', [
            'controller_name' => 'Test2Controller',
            'test2' => $test2,
            'niveaux' => $niveau,
        ]);  
    } 

    /**
     * @Route("/test/list", name="app_test_list")
     */
    public function testList(Request $request)
    {
        // Récupérer tous les niveaux pour la liste déroulante
        $niveaux = $this->getDoctrine()->getRepository(Niveau::class)->findAll();

        // Récupérer le niveau sélectionné depuis la requête
        $niveauId = $request->query->get('niveau');

        // Récupérer les tests filtrés en fonction du niveau sélectionné
        if ($niveauId === 'all') {
            $tests = $this->getDoctrine()->getRepository(Test2::class)->findAll();
        } else {
            // Récupérer les tests filtrés en fonction du niveau sélectionné
            $tests = $this->getDoctrine()->getRepository(Test2::class)->findByNiveau($niveauId);
        }

        return $this->render('test2/index.html.twig', [
            'niveaux' => $niveaux,
            'test2' => $tests,
        ]);
    }

    /**
     * @Route("/ajout-test2", name="app_ajout_test2")
     */
    public function add(Request $request): Response
    {
        // if ($this->get('session')->get('ID') != "")
        // {
            $test2 = new Test2();
            date_default_timezone_set('Europe/Paris'); // heure de la france
            $date = new \DateTime('now'); // date du jour
            
            
            $form = $this->createFormBuilder($test2)
                         ->add('libelle_test2', TextareaType::class, ['attr' => ['rows' => 7,'cols' => 30, 'class' => 'avisC']])  // textarea supremacy
                         ->getForm();
                         
            $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            // $user = new Utilisateurs();
            // $user = $this->getDoctrine()->getRepository(Utilisateurs::class)->find($this->get('session')->get('id'));


            $test2 = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($test2);
            $entityManager->flush();   // envoie vers base 
            return $this->redirectToRoute('app_test2');
        }
        return $this->render('test2/ajout.html.twig', [
            'ajoutTest2' => $form->createview(),    
        ]);
    }

    /**
     * @Route("/modif-test2", name="app_modif_test2")
     */
    public function edit(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($this->get('session')->get('Droit') == 1)
        {
            if (isset($_POST['idTest2Modif']))
            {
                $this->get('session')->set('IDModif', $_POST['idTest2Modif']);
            }
            $msgErrPrestaModif = "";

            $repo = $this->getDoctrine()->getRepository(Test2::class);

            $tests = $repo->findAll();

            $testModif = $this->getDoctrine()->getRepository(Test2::class)->find($this->get('session')->get('IDModif'));

        
        $form = $this->createForm(Test2Modif::class);                  
        $form->handleRequest($request);

        if ($form->isSubmitted())
            {
                if ($form->isValid())
                {
                    if ($form->get('libelle_test2')->getData() != null)
                    {
                        $testModif->setLibelleTest2($form->get('libelle_test2')->getData());
                    }
                    if ($form->get('libelle_test2')->getData() == null)
                    {
                        $this->addFlash('success', 'Aucune nouvelle donnée de saisi, le test n\'a donc pas été modifié !');
                        return $this->redirectToRoute('app_test2');
                    }
                    else
                    {
                        $entityManager->flush();

                        $this->addFlash('success', 'Un test a été modifié récemment !');
                        return $this->redirectToRoute('app_test2');
                    }  
                }
                else
                {
                    $msgErrPrestaModif = "Une ou plusieurs données sont incorrectes, veuillez les resaisir !";
                }
            }
            return $this->render('test2/modif.html.twig', [
                'modifTest2' => $form->createView(),
                'tests' => $tests,
                'idModifTest2' => $this->get('session')->get('IDModif'),
                'MSGErrPrestaModif' => $msgErrPrestaModif
            ]);
        }
        else
        {
            return $this->redirectToRoute('app_test2');
        }
    }
    


    /**
     * @Route("/suppr-test2", name="app_suppr_test2")
     */
    public function supprprestation(Request $request, EntityManagerInterface $entityManager): Response
    {
        // if ($this->get('session')->get('Droit') == 1)
        // {
            $test2Suppr = $this->getDoctrine()->getRepository(Test2::class)->find($_POST['idTest2Suppr']);

            $entityManager->remove($test2Suppr);
            $entityManager->flush();

            $this->addFlash('success', 'Le commentaire a été supprimé récemment !');
            return $this->redirectToRoute('app_test2');
        // }
        // else
        // {
        //     return $this->redirectToRoute('app_avis');
        // }
    }
}
// }
