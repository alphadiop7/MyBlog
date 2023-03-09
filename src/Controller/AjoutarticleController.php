<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjoutarticleController extends AbstractController
{
    public function __construct (ManagerRegistry $mr)
    {
        $this->mr = $mr;
    }
    private $mr;
    #[Route('/ajoutarticle', name: 'app_ajoutarticle')]
    public function index(Request $request): Response
    {
        $article = new Article();

        $entityManager = $this->mr->getManager();

        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $article = $form->getData();

            $entityManager->persist($article);

            $entityManager->flush();

            return $this->redirectToRoute('app_accueil');
        }

        return $this->render('ajoutarticle/index.html.twig', [
            'title' => 'Ajout Article',
            'form' => $form,
        ]);
    }
}
