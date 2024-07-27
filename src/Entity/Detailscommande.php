<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Repository\DetailscommandeRepository;
#[ORM\Entity(repositoryClass: DetailscommandeRepository::class)]
class Detailscommande
{
    
    #[ORM\Id]

    #[ORM\GeneratedValue]
    
    #[ORM\Column]
    
    private ?int $id = null;

    #[ORM\Column ] private ?int $numDetailscommande = null;   

    #[ORM\Column (length: 255)] private ?string $nomDetailscommande= null;   

    #[ORM\Column ] private ?int $quantite = null;   

    #[ORM\Column ] private ?float $prixUnitaire = null;   

    #[ORM\Column ] private ?float $sousTotal = null;   

    #[ORM\ManyToOne(inversedBy: 'Commande')] private ?Commande $idCom = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumDetailscommande(): ?int
    {
        return $this->numDetailscommande;
    }

    public function setNumDetailscommande(int $numDetailscommande): static
    {
        $this->numDetailscommande = $numDetailscommande;

        return $this;
    }

    public function getNomDetailscommande(): ?string
    {
        return $this->nomDetailscommande;
    }

    public function setNomDetailscommande(string $nomDetailscommande): static
    {
        $this->nomDetailscommande = $nomDetailscommande;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrixUnitaire(): ?float
    {
        return $this->prixUnitaire;
    }

    public function setPrixUnitaire(float $prixUnitaire): static
    {
        $this->prixUnitaire = $prixUnitaire;

        return $this;
    }

    public function getSousTotal(): ?float
    {
        return $this->sousTotal;
    }

    public function setSousTotal(float $sousTotal): static
    {
        $this->sousTotal = $sousTotal;

        return $this;
    }

    public function getIdCom(): ?Commande
    {
        return $this->idCom;
    }

    public function setIdCom(?Commande $idCom): static
    {
        $this->idCom = $idCom;

        return $this;
    }


}
