<?php

namespace App\Controller;
use DateTime;

use App\Entity\Publication;
use App\Entity\User;
use App\Entity\Commentaire;
use App\Repository\PublicationRepository;
use App\Form\PublicationType;
use App\Form\CommentaireType;
use Symfony\Component\Form\FormError;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use App\Repository\CommentaireRepository;
use Doctrine\ORM\EntityManager;

#[Route('/publication')]
class PublicationController extends AbstractController
{
    #[Route('/', name: 'app_publication_index', methods: ['GET'])]
    public function index(PublicationRepository $publicationRepository): Response
    {
        return $this->render('publication/index.html.twig', [
            'publications' => $publicationRepository->findAll(),
        ]);
    }

    #[Route('/front_index/{id_client}', name: 'app_publication_indexfront', methods: ['GET', 'POST'])]
    public function indexfront(Request $request, EntityManagerInterface $entityManager, CommentaireRepository $commentaireRepository, int $id_client): Response
    {
        $user = $entityManager->getRepository(User::class)->findOneBy(['id' => $id_client]);
        
        // Handle publication form submission
        $publication = new Publication();
        $publication->setNbLikes(0);
        $publication->setNbDislike(0);
        $dateTime = new \DateTime('now', new \DateTimeZone('Africa/Tunis'));
        $publication->setDatePub($dateTime);
        $form = $this->createForm(PublicationType::class, $publication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $photoFile = $form->get('photoFile')->getData();
            if ($photoFile) {
                $newFilename = $this->uploadPhoto($photoFile);
                $publication->setPhoto($newFilename);
            }
            $publication->setIdClient($user); 
            $entityManager->persist($publication);
            $entityManager->flush();

            return $this->redirectToRoute('app_publication_indexfront', ['id_client' => $id_client]);
        }

          $commentaire = new Commentaire();
    $formC = $this->createForm(CommentaireType::class, $commentaire);
    $formC->handleRequest($request);

    if ($formC->isSubmitted() && $formC->isValid()) {
        $idPub = $request->request->get('idPub');
        $publication = $entityManager->getRepository(Publication::class)->find($idPub);
        if (!$publication) {
            throw $this->createNotFoundException('Publication not found');
        }
        
        // Set the user ID, publication ID, and current date for the comment
        $commentaire->setIdClient($user);
        $commentaire->setIdPub($idPub);
        $commentaire->setDateCom(new \DateTime());
        
            $entityManager->persist($commentaire);
            $entityManager->flush();

            // Redirect back to the same page
            return $this->redirectToRoute('app_publication_indexfront', ['id_client' => $id_client]);
        }

        // Retrieve publications
        $publications = $entityManager->getRepository(Publication::class)->findAll();

        // Retrieve comments for each publication
        $comments = [];
        foreach ($publications as $pub) {
            $comments[$pub->getIdPub()] = $commentaireRepository->findBy(['idPub' => $pub]);
        }

        // Render the template
        return $this->render('publication/front.html.twig', [
            'publications' => $publications,
            'id_client' => $id_client,
            'comments' => $comments,
            'form' => $form->createView(),
            'formC' => $formC->createView(),
        ]);
    }



    #[Route('/new', name: 'app_publication_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $publication = new Publication();
        $publication->setNbLikes(0);
        $publication->setNbDislike(0);
        $dateTime = new \DateTime('now', new \DateTimeZone('Africa/Tunis'));
        $publication->setDatePub($dateTime);
        $form = $this->createForm(PublicationType::class, $publication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Gérer le téléchargement de la photo
            $photoFile = $form->get('photoFile')->getData();
            if ($photoFile) {
                $newFilename = $this->uploadPhoto($photoFile);
                $publication->setPhoto($newFilename);
            }

            $entityManager->persist($publication);
            $entityManager->flush();

            return $this->redirectToRoute('app_publication_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('publication/new.html.twig', [
            'publication' => $publication,
            'form' => $form,
        ]);
    }

    #[Route('/{idPub}', name: 'app_publication_show', methods: ['GET'])]
    public function show(Publication $publication): Response
    {
        return $this->render('publication/show.html.twig', [
            'publication' => $publication,
        ]);
    }

    #[Route('/{idPub}/comments', name: 'app_publication_comments', methods: ['GET'])]
    public function showComments(Publication $publication, CommentaireRepository $commentaireRepository): Response
    {
        $comments = $commentaireRepository->findBy(['idPub' => $publication]);

        return $this->render('commentaire/index.html.twig', [
            'publication' => $publication,
            'commentaires' => $comments,
        ]);
    }

    #[Route('/{idPub}/edit', name: 'app_publication_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Publication $publication, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PublicationType::class, $publication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $photoFile = $form->get('photoFile')->getData();
            if ($photoFile) {
                $newFilename = $this->uploadPhoto($photoFile);
                $publication->setPhoto($newFilename);
            }

            $entityManager->flush();

            return $this->redirectToRoute('app_publication_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('publication/edit.html.twig', [
            'publication' => $publication,
            'form' => $form,
        ]);
    }
    #[Route('/{idPub}/editfront', name: 'app_publication_editfront', methods: ['GET', 'POST'])]
    public function editfront(Request $request, Publication $publication, EntityManagerInterface $entityManager): Response
{
    $form = $this->createForm(PublicationType::class, $publication);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // Si vous avez besoin de télécharger une nouvelle photo
        $photoFile = $form->get('photoFile')->getData();
        if ($photoFile) {
            $newFilename = $this->uploadPhoto($photoFile);
            $publication->setPhoto($newFilename);
        }

        // Persistez et enregistrez les modifications dans la base de données
        $entityManager->flush();

        return $this->redirectToRoute('app_publication_indexfront');
    }

    return $this->render('publication/editfront.html.twig', [
        'publication' => $publication,
        'form' => $form->createView(),
    ]);
}

    #[Route('/{idPub}', name: 'app_publication_delete', methods: ['POST'])]
    public function delete(Request $request, Publication $publication, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$publication->getIdPub(), $request->request->get('_token'))) {
            $entityManager->remove($publication);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_publication_index', [], Response::HTTP_SEE_OTHER);
    }

 #[Route('/{idPub}/supprimer', name: 'app_publication_supprimer', methods: ['POST'])]
public function supprimer(Request $request, Publication $publication, EntityManagerInterface $entityManager): Response
{
    if ($this->isCsrfTokenValid('supprimer'.$publication->getIdPub(), $request->request->get('_token'))) {
        $entityManager->remove($publication);
        $entityManager->flush();
    }
    
    return $this->redirectToRoute('app_publication_indexfront', [], Response::HTTP_SEE_OTHER);
}

    private function uploadPhoto($photoFile)
    {
        // Définir l'emplacement de stockage des photos
        $uploadsDirectory = $this->getParameter('kernel.project_dir').'/public/assets';

        // Générer un nom de fichier unique
        $newFilename = uniqid().'.'.$photoFile->guessExtension();

        try {
            // Déplacer le fichier téléchargé vers l'emplacement de stockage
            $photoFile->move($uploadsDirectory, $newFilename);
        } catch (FileException $e) {
            // Gérer les erreurs de téléchargement de fichier
            throw new FileException('Erreur lors du téléchargement du fichier');
        }

        // Retourner le chemin complet du fichier téléchargé
        return '/assets/'.$newFilename;
    }
}
