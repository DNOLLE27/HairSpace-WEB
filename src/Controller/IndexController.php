<?php

namespace App\Controller;

use App\Entity\Droits;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {

        $repo = $this->getDoctrine()->getRepository(Droits::class)->findAll();
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'droits' => $repo,
        ]);
    }
}
