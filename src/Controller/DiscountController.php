<?php

namespace App\Controller;

use App\Entity\Discount;
use App\Form\DiscountType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/discount')]
class DiscountController extends AbstractController
{
    #[Route('/', name: 'app_discount_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $discounts = $entityManager
            ->getRepository(Discount::class)
            ->findAll();

        return $this->render('discount/index.html.twig', [
            'discounts' => $discounts,
        ]);
    }

    #[Route('/new', name: 'app_discount_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $discount = new Discount();
        $form = $this->createForm(DiscountType::class, $discount);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($discount);
            $entityManager->flush();

            return $this->redirectToRoute('app_discount_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('discount/new.html.twig', [
            'discount' => $discount,
            'form' => $form,
        ]);
    }

    #[Route('/{idd}', name: 'app_discount_show', methods: ['GET'])]
    public function show(Discount $discount): Response
    {
        return $this->render('discount/show.html.twig', [
            'discount' => $discount,
        ]);
    }

    #[Route('/{idd}/edit', name: 'app_discount_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Discount $discount, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DiscountType::class, $discount);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_discount_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('discount/edit.html.twig', [
            'discount' => $discount,
            'form' => $form,
        ]);
    }

    #[Route('/{idd}', name: 'app_discount_delete', methods: ['POST'])]
    public function delete(Request $request, Discount $discount, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$discount->getIdd(), $request->request->get('_token'))) {
            $entityManager->remove($discount);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_discount_index', [], Response::HTTP_SEE_OTHER);
    }
}
