<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    private $mr;
    public function __construct(ManagerRegistry $mr)
    {
        $this->mr = $mr;
    }
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        $articles = $this->mr->getRepository(Article::class)->findAll();
        return $this->render('accueil/index.html.twig', [
            'title' => 'Accueil',
            'articles' => $articles,
        ]);
    }
}
