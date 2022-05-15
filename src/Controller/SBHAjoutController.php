<?php

namespace App\Controller;

use App\Entity\SBHArticle;
use App\Form\SBHFormType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormTypeInterface;
#[Route('/sbhajout')]
class SBHAjoutController extends AbstractController
{
    #[Route('/', name: 'app.sbhajout')]
    public function index(ManagerRegistry $doctrine , Request $request, SBHArticle $article=null): Response
    {

        if (!$article) {
            $article = new SBHArticle();
        }

        $form = $this->createForm(SBHFormType::class, $article);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            //$form->getData()
            $entityManager = $doctrine->getManager();
            $entityManager->persist($article);

            $entityManager->flush();
            $this->addFlash("success", " your changes are saved  ");
            return $this->redirectToRoute('app_article');


        } else {
            return $this->render('sbh_ajout/index.html.twig', [
                'form' => $form->createView(),
            ]);


        }
    }}
