<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Presentation;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PresentationController extends AbstractController
{
    /**
     * @Route("/presentation", name="app_presentation")
     */
    public function edit(Request $request): Response
    {
        $repo = new Presentation();
        $repo = $this->getDoctrine()->getRepository(Presentation::class);
        $pres = $repo->findAll();

        $presentation = new Presentation();
        $pp = $this->getDoctrine()->getRepository(Presentation::class)->find(1);
            
        $form = $this->createFormBuilder($pp)
                        ->add('pst_text', TextareaType::class, ['attr' => ['rows' => 7,'cols' => 50, 'class' => 'pst_text']])
                        ->add('pst_image', TextType::class, ['attr' => ['class' => 'pst_image']])
                        ->getForm();
                         
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();
            return $this->render('presentation/index.html.twig', [
                'modifPres' => $form->createview(),
                'presentations' => $pres,
            ]);
        } else {
            return $this->render('presentation/index.html.twig', [
                'modifPres' => $form->createview(),
                'presentations' => $pres,
            ]);
        }
                         
           

        }
}
