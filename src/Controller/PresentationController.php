<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Presentation;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class PresentationController extends AbstractController
{
    /**
     * @Route("/presentation", name="app_presentation")
     */
    public function edit(Request $request): Response
    {
        $repo = $this->getDoctrine()->getRepository(Presentation::class);

        $pres = $repo-->find(1);
            $presentation = new Presentation();
            $pp = $this->getDoctrine()->getRepository(Presentation::class)->findAll();
            
            
            
            $form = $this->createFormBuilder($presentation)
                         ->add('pst_text', TextareaType::class)
                         ->add('pst_image')
                         ->getForm();
                         
            $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();
            return $this->redirectToRoute('app_presentation');
        }
                         
            return $this->render('presentation/index.html.twig', [
                'modifPres' => $form->createview(),
                'presentations' => $pres,
         
            ]);

        }
}
