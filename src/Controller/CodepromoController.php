<?php

namespace App\Controller;

use App\Entity\Codepromo;
use App\Form\CodepromoType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/codepromo')]
class CodepromoController extends AbstractController
{
    #[Route('/', name: 'app_codepromo_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $codepromos = $entityManager
            ->getRepository(Codepromo::class)
            ->findAll();

        return $this->render('codepromo/index.html.twig', [
            'codepromos' => $codepromos,
        ]);
    }

    #[Route('/new', name: 'app_codepromo_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $codepromo = new Codepromo();
        $form = $this->createForm(CodepromoType::class, $codepromo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($codepromo);
            $entityManager->flush();

            return $this->redirectToRoute('app_codepromo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('codepromo/new.html.twig', [
            'codepromo' => $codepromo,
            'form' => $form,
        ]);
    }

    #[Route('/{idcode}', name: 'app_codepromo_show', methods: ['GET'])]
    public function show(Codepromo $codepromo): Response
    {
        return $this->render('codepromo/show.html.twig', [
            'codepromo' => $codepromo,
        ]);
    }

    #[Route('/{idcode}/edit', name: 'app_codepromo_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Codepromo $codepromo, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CodepromoType::class, $codepromo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_codepromo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('codepromo/edit.html.twig', [
            'codepromo' => $codepromo,
            'form' => $form,
        ]);
    }

    #[Route('/{idcode}', name: 'app_codepromo_delete', methods: ['POST'])]
    public function delete(Request $request, Codepromo $codepromo, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$codepromo->getIdcode(), $request->request->get('_token'))) {
            $entityManager->remove($codepromo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_codepromo_index', [], Response::HTTP_SEE_OTHER);
    }
}
