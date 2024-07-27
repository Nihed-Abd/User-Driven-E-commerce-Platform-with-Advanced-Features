<?php

namespace App\Controller;

use App\Entity\Categoriecodepromo;
use App\Form\CategoriecodepromoType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/categoriecodepromo')]
class CategoriecodepromoController extends AbstractController
{
    #[Route('/', name: 'app_categoriecodepromo_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $categoriecodepromos = $entityManager
            ->getRepository(Categoriecodepromo::class)
            ->findAll();

        return $this->render('categoriecodepromo/index.html.twig', [
            'categoriecodepromos' => $categoriecodepromos,
        ]);
    }

    #[Route('/new', name: 'app_categoriecodepromo_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $categoriecodepromo = new Categoriecodepromo();
        $form = $this->createForm(CategoriecodepromoType::class, $categoriecodepromo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($categoriecodepromo);
            $entityManager->flush();

            return $this->redirectToRoute('app_categoriecodepromo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('categoriecodepromo/new.html.twig', [
            'categoriecodepromo' => $categoriecodepromo,
            'form' => $form,
        ]);
    }

    #[Route('/{idccp}', name: 'app_categoriecodepromo_show', methods: ['GET'])]
    public function show(Categoriecodepromo $categoriecodepromo): Response
    {
        return $this->render('categoriecodepromo/show.html.twig', [
            'categoriecodepromo' => $categoriecodepromo,
        ]);
    }

    #[Route('/{idccp}/edit', name: 'app_categoriecodepromo_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Categoriecodepromo $categoriecodepromo, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CategoriecodepromoType::class, $categoriecodepromo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_categoriecodepromo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('categoriecodepromo/edit.html.twig', [
            'categoriecodepromo' => $categoriecodepromo,
            'form' => $form,
        ]);
    }

    #[Route('/{idccp}', name: 'app_categoriecodepromo_delete', methods: ['POST'])]
    public function delete(Request $request, Categoriecodepromo $categoriecodepromo, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categoriecodepromo->getIdccp(), $request->request->get('_token'))) {
            $entityManager->remove($categoriecodepromo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_categoriecodepromo_index', [], Response::HTTP_SEE_OTHER);
    }
}
