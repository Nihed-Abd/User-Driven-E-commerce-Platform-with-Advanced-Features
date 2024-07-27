<?php

namespace App\Controller;

use App\Entity\TicketEnchere;
use App\Form\TicketEnchereType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/ticket/enchere')]
class TicketEnchereController extends AbstractController
{
    #[Route('/', name: 'app_ticket_enchere_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $ticketEncheres = $entityManager
            ->getRepository(TicketEnchere::class)
            ->findAll();

        return $this->render('ticket_enchere/index.html.twig', [
            'ticket_encheres' => $ticketEncheres,
        ]);
    }

    #[Route('/new', name: 'app_ticket_enchere_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ticketEnchere = new TicketEnchere();
        $form = $this->createForm(TicketEnchereType::class, $ticketEnchere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ticketEnchere);
            $entityManager->flush();

            return $this->redirectToRoute('app_ticket_enchere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ticket_enchere/new.html.twig', [
            'ticket_enchere' => $ticketEnchere,
            'form' => $form,
        ]);
    }

    #[Route('/{ticketId}', name: 'app_ticket_enchere_show', methods: ['GET'])]
    public function show(TicketEnchere $ticketEnchere): Response
    {
        return $this->render('ticket_enchere/show.html.twig', [
            'ticket_enchere' => $ticketEnchere,
        ]);
    }

    #[Route('/{ticketId}/edit', name: 'app_ticket_enchere_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TicketEnchere $ticketEnchere, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TicketEnchereType::class, $ticketEnchere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ticket_enchere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ticket_enchere/edit.html.twig', [
            'ticket_enchere' => $ticketEnchere,
            'form' => $form,
        ]);
    }

    #[Route('/{ticketId}', name: 'app_ticket_enchere_delete', methods: ['POST'])]
    public function delete(Request $request, TicketEnchere $ticketEnchere, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ticketEnchere->getTicketId(), $request->request->get('_token'))) {
            $entityManager->remove($ticketEnchere);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ticket_enchere_index', [], Response::HTTP_SEE_OTHER);
    }
}
