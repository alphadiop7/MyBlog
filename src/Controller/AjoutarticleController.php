<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjoutarticleController extends AbstractController
{
    private $mr;
    #[Route('/ajoutarticle', name: 'app_ajoutarticle')]
    public function index(Request $request): Response
    {
        $article = new Article();

        $form = $this->createForm(ArticleType::class, $article);

        return $this->render('ajoutarticle/index.html.twig', [
            'title' => 'Ajout Article',
            'form' => $form,
        ]);
    }
}
