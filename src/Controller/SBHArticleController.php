<?php

namespace App\Controller;

use App\Entity\SBHArticle;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormTypeInterface;
#[Route('/sbharticle')]
class SBHArticleController extends AbstractController
{
    #[Route('/', name: 'sbharticle')]
    public function sbh(ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(SBHArticle::class);
        $article = $repo->findAll();

        return $this->render('sbh_article/index.html.twig', [
            'articles' => $article
        ]);
    }



//    #[Route('/{nom}/{prix}', name: 'sbharticle.add')]
//    public function sbhinserer($nom,$prix): Response
//    {
//
//
//
//        return $this->render('sbh_article/index.html.twig', [
//            'controller_name' => 'SBHArticleController',
//        ]);
//    }
}
