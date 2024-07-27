<?php

namespace App\Controller;

use App\Entity\Ticketp;
use App\Form\TicketpType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/ticketp')]
class TicketpController extends AbstractController
{
    #[Route('/', name: 'app_ticketp_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $ticketps = $entityManager
            ->getRepository(Ticketp::class)
            ->findAll();

        return $this->render('ticketp/index.html.twig', [
            'ticketps' => $ticketps,
        ]);
    }

    #[Route('/new', name: 'app_ticketp_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ticketp = new Ticketp();
        $form = $this->createForm(TicketpType::class, $ticketp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ticketp);
            $entityManager->flush();

            return $this->redirectToRoute('app_ticketp_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ticketp/new.html.twig', [
            'ticketp' => $ticketp,
            'form' => $form,
        ]);
    }

    #[Route('/{ticketpId}', name: 'app_ticketp_show', methods: ['GET'])]
    public function show(Ticketp $ticketp): Response
    {
        return $this->render('ticketp/show.html.twig', [
            'ticketp' => $ticketp,
        ]);
    }

    #[Route('/{ticketpId}/edit', name: 'app_ticketp_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Ticketp $ticketp, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TicketpType::class, $ticketp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ticketp_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ticketp/edit.html.twig', [
            'ticketp' => $ticketp,
            'form' => $form,
        ]);
    }

    #[Route('/{ticketpId}', name: 'app_ticketp_delete', methods: ['POST'])]
    public function delete(Request $request, Ticketp $ticketp, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ticketp->getTicketpId(), $request->request->get('_token'))) {
            $entityManager->remove($ticketp);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ticketp_index', [], Response::HTTP_SEE_OTHER);
    }
}
