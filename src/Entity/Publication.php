<?php

namespace App\Entity;

use App\Repository\PublicationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PublicationRepository::class)]
class Publication
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_pub')]
    private ?int $idPub = null;

    #[ORM\Column(name: 'contenu', length: 255)]
    #[Assert\NotBlank(message: "Le contenu ne peut pas être vide.")]
    private ?string $contenu = null; 

    #[ORM\Column(name: 'photo', length: 255)]
    private ?string $photo = null;

    #[ORM\Column(name: 'nb_likes')]
    #[Assert\NotBlank(message: "Le nombre de likes ne peut pas être vide.")]
    private ?int $nbLikes = null;

    #[ORM\Column(name: 'nb_dislike')]
    #[Assert\NotBlank(message: "Le nombre de dislikes ne peut pas être vide.")]
    private ?int $nbDislike = null;

    #[ORM\Column(name: 'date_pub', type: 'datetime')]
    #[Assert\Type("\DateTimeInterface", message: "La date de publication doit être un objet DateTimeInterface.")]
    private ?\DateTimeInterface $datePub = null;

    #[ORM\ManyToOne(inversedBy: 'publications')]
    #[ORM\JoinColumn(name: 'id_client', nullable: true)]
    private ?User $idClient = null;

    // Ajoutez cette propriété si vous utilisez Symfony 5.3+
    #[Assert\Image(maxSize: '5M', mimeTypes: ['image/jpeg', 'image/png'])]
    private ?UploadedFile $photoFile = null;

    public function getIdPub(): ?int
    {
        return $this->idPub;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;
        return $this;
    }

    public function getNbLikes(): ?int
    {
        return $this->nbLikes;
    }

    public function setNbLikes(int $nbLikes): self
    {
        $this->nbLikes = $nbLikes;
        return $this;
    }

    public function getNbDislike(): ?int
    {
        return $this->nbDislike;
    }

    public function setNbDislike(int $nbDislike): self
    {
        $this->nbDislike = $nbDislike;
        return $this;
    }

    public function getDatePub(): ?\DateTimeInterface
    {
        return $this->datePub;
    }

    public function setDatePub(\DateTimeInterface $datePub): self
    {
        $this->datePub = $datePub;
        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;
        return $this;
    }

    public function getIdClient(): ?User
    {
        return $this->idClient;
    }

    public function setIdClient(?User $idClient): self
    {
        $this->idClient = $idClient;
        return $this;
    }

    // Getter et Setter pour photoFile
    public function getPhotoFile(): ?UploadedFile
    {
        return $this->photoFile;
    }

    public function setPhotoFile(?UploadedFile $photoFile): self
    {
        $this->photoFile = $photoFile;
        return $this;
    }

    // La méthode __toString() doit retourner une chaîne de caractères
    public function __toString(): string
    {
        return (string) $this->idPub;
    }
}