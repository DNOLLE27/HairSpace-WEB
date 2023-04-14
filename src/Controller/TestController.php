<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Test;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TestController extends AbstractController
{
    #[Route('/list-test', name: 'app_test')]
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Test::class);

        $tests = $repo->findAll();

        return $this->render('test/list-test.html.twig', [
            'controller_name' => 'TestController',
            'Test' => $tests
        ]);
    }

    /**
     * @Route("/test", name="app_ajout_test")
     */
    public function addTest(Request $request): Response
    {
       
            $test = new Test();
            date_default_timezone_set('Europe/Paris'); // heure de la france
            $date = new \DateTime('now'); // date du jour
            
            
            $form = $this->createFormBuilder($test)
                         ->add('libelle_test')  // textarea supremacy
                         ->getForm();
                         
            $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            // $user = new Utilisateurs();
            // $user = $this->getDoctrine()->getRepository(Utilisateurs::class)->find($this->get('session')->get('id'));


            $test = $form->getData();
            // $avis->setAvsDate($date); // on rentre les valeurs manquantes
            // $avis->setAvsUtlNum($user); // on rentre les valeurs manquantes

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($test);
            $entityManager->flush();   // envoie vers base 
            return $this->redirectToRoute('app_test');
        }
                         
            return $this->render('test/index.html.twig', [
                'ajoutTest' => $form->createview(),    
            ]);
        }

        

        /** 
         * @Route("/modif-test", name="app_modif_test")
         */
        public function editTest(Request $request): Response
    {

        $repo = new Test();
        $repo = $this->getDoctrine()->getRepository(Test::class);
        $test = $repo->findAll();

        $testus = new Test();
        $idTestModif = 1;
        $pp = $this->getDoctrine()->getRepository(Test::class)->find($idTestModif);
        var_dump($pp->getId()) ;   
        $form = $this->createFormBuilder($pp)
                        ->add('libelle_test')
                        ->getForm();
                         
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();
            return $this->render('test/modif-test.html.twig', [
                'modifTest' => $form->createview(),
                'Test' => $testus,
            ]);
        }
        return $this->render('test/modif-test.html.twig', [
            'modifTest' => $form->createview(),
            'Test' => $testus,
        ]);
    
    }

}