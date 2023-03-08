<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjoutarticleController extends AbstractController
{
    #[Route('/ajoutarticle', name: 'app_ajoutarticle')]
    public function index(): Response
    {
        return $this->render('ajoutarticle/index.html.twig', [
            'title' => 'Ajout Article',
        ]);
    }
}
