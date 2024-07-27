<?php

namespace App\Controller;

use App\Entity\Grosmots;
use App\Form\GrosmotsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/grosmots')]
class GrosmotsController extends AbstractController
{
    #[Route('/', name: 'app_grosmots_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $grosmots = $entityManager
            ->getRepository(Grosmots::class)
            ->findAll();

        return $this->render('grosmots/index.html.twig', [
            'grosmots' => $grosmots,
        ]);
    }

    #[Route('/new', name: 'app_grosmots_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $grosmot = new Grosmots();
        $form = $this->createForm(GrosmotsType::class, $grosmot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($grosmot);
            $entityManager->flush();

            return $this->redirectToRoute('app_grosmots_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('grosmots/new.html.twig', [
            'grosmot' => $grosmot,
            'form' => $form,
        ]);
    }

    #[Route('/{idGm}', name: 'app_grosmots_show', methods: ['GET'])]
    public function show(Grosmots $grosmot): Response
    {
        return $this->render('grosmots/show.html.twig', [
            'grosmot' => $grosmot,
        ]);
    }

    #[Route('/{idGm}/edit', name: 'app_grosmots_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Grosmots $grosmot, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(GrosmotsType::class, $grosmot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_grosmots_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('grosmots/edit.html.twig', [
            'grosmot' => $grosmot,
            'form' => $form,
        ]);
    }

    #[Route('/{idGm}', name: 'app_grosmots_delete', methods: ['POST'])]
    public function delete(Request $request, Grosmots $grosmot, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$grosmot->getIdGm(), $request->request->get('_token'))) {
            $entityManager->remove($grosmot);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_grosmots_index', [], Response::HTTP_SEE_OTHER);
    }
}
