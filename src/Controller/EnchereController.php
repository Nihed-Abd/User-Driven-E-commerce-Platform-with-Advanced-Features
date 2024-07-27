<?php

namespace App\Controller;

use App\Entity\Enchere;
use App\Form\EnchereType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/enchere')]
class EnchereController extends AbstractController
{
    #[Route('/', name: 'app_enchere_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $encheres = $entityManager
            ->getRepository(Enchere::class)
            ->findAll();

        return $this->render('enchere/index.html.twig', [
            'encheres' => $encheres,
        ]);
    }

    #[Route('/new', name: 'app_enchere_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $enchere = new Enchere();
        $form = $this->createForm(EnchereType::class, $enchere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($enchere);
            $entityManager->flush();

            return $this->redirectToRoute('app_enchere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('enchere/new.html.twig', [
            'enchere' => $enchere,
            'form' => $form,
        ]);
    }

    #[Route('/{enchereId}', name: 'app_enchere_show', methods: ['GET'])]
    public function show(Enchere $enchere): Response
    {
        return $this->render('enchere/show.html.twig', [
            'enchere' => $enchere,
        ]);
    }

    #[Route('/{enchereId}/edit', name: 'app_enchere_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Enchere $enchere, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EnchereType::class, $enchere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_enchere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('enchere/edit.html.twig', [
            'enchere' => $enchere,
            'form' => $form,
        ]);
    }

    #[Route('/{enchereId}', name: 'app_enchere_delete', methods: ['POST'])]
    public function delete(Request $request, Enchere $enchere, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$enchere->getEnchereId(), $request->request->get('_token'))) {
            $entityManager->remove($enchere);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_enchere_index', [], Response::HTTP_SEE_OTHER);
    }
}
