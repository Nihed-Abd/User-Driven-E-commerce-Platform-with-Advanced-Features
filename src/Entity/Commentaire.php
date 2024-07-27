<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Entity\Publication;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use App\Repository\CommentaireRepository;
#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
class Commentaire
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idCom = null;
    
    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le contenu du commentaire ne peut pas être vide.")]
    #[Assert\Length(max: 255, maxMessage: "Le contenu du commentaire ne peut pas dépasser {{ limit }} caractères.")]
    private ?string $contenu = null;   

    #[ORM\Column(type:"datetime")]
    #[Assert\NotBlank(message: "La date du commentaire ne peut pas être vide.")]
    private ?\DateTimeInterface $dateCom = null;

    #[ORM\ManyToOne(targetEntity: Publication::class, inversedBy: 'commentaires')]
    #[ORM\JoinColumn(name: 'id_pub', referencedColumnName: 'id_pub')]
    #[Assert\NotNull(message: "La publication ne peut pas être vide.")]
    private ?Publication $idPub = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'commentaires')]
    #[ORM\JoinColumn(name: 'id_client', referencedColumnName: 'id')]
    #[Assert\NotNull(message: "L'utilisateur ne peut pas être vide.")]
    private ?User $idClient = null;


    public function getIdCom(): ?int
    {
        return $this->idCom;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): static
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDateCom(): ?\DateTimeInterface
    {
        return $this->dateCom;
    }

    public function setDateCom(\DateTimeInterface $dateCom): static
    {
        $this->dateCom = $dateCom;

        return $this;
    }

    public function getIdPub(): ?Publication
    {
        return $this->idPub;
    }

    public function setIdPub(?Publication $idPub): static
    {
        $this->idPub = $idPub;

        return $this;
    }

    public function getIdClient(): ?User
    {
        return $this->idClient;
    }

    public function setIdClient(?User $idClient): static
    {
        $this->idClient = $idClient;

        return $this;
    }
}
