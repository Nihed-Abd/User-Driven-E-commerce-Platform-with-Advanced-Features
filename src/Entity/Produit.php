<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Repository\ProduitRepository;
#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    
    #[ORM\Id]

    #[ORM\GeneratedValue]
    
    #[ORM\Column]
    
    private ?int $idP = null;
    #[ORM\Column (length: 255) ] private ?string $nomP = null;   
    #[ORM\Column (length: 255) ] private ?string $descriptionP = null;   
    #[ORM\Column (length: 255) ] private ?float $prixP = null;   
    #[ORM\Column (length: 255) ] private ?string $imageP = null;   
    #[ORM\ManyToOne(inversedBy: 'User')] private ?User $idClient = null;
    #[ORM\ManyToOne(inversedBy: 'Categorie')] private ?Categorie $idC = null;


    public function getIdP(): ?int
    {
        return $this->idP;
    }

    public function getNomP(): ?string
    {
        return $this->nomP;
    }

    public function setNomP(string $nomP): static
    {
        $this->nomP = $nomP;

        return $this;
    }

    public function getDescriptionP(): ?string
    {
        return $this->descriptionP;
    }

    public function setDescriptionP(string $descriptionP): static
    {
        $this->descriptionP = $descriptionP;

        return $this;
    }

    public function getPrixP(): ?float
    {
        return $this->prixP;
    }

    public function setPrixP(float $prixP): static
    {
        $this->prixP = $prixP;

        return $this;
    }

    public function getImageP(): ?string
    {
        return $this->imageP;
    }

    public function setImageP(string $imageP): static
    {
        $this->imageP = $imageP;

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

    public function getIdC(): ?Categorie
    {
        return $this->idC;
    }

    public function setIdC(?Categorie $idC): static
    {
        $this->idC = $idC;

        return $this;
    }


}
