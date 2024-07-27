<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Repository\EnchereRepository;
#[ORM\Entity(repositoryClass: EnchereRepository::class)]
class Enchere
{
    
    #[ORM\Id]

    #[ORM\GeneratedValue]
    
    #[ORM\Column]
    
    private ?int $enchereId = null;
    #[ORM\Column (length: 255) ] private ?string $idclcreree = null;   
    #[ORM\Column (length: 255) ] private ?string $idclenchere = null;   

    #[ORM\Column (length: 255)] private ?string $dateDebut = null;   
    #[ORM\Column (length: 255)] private ?string $heured = null;  
    #[ORM\Column (length: 255)] private ?string $dateFin = null;   
    #[ORM\Column (length: 255)] private ?string $heuref = null;  
    #[ORM\Column (length: 255)] private ?string $montantInitial = null;
    #[ORM\Column (length: 255)] private ?string $montantFinal = null;

    #[ORM\Column (length: 255)] private ?string $nomEnchere = null;   
    #[ORM\Column (length: 255)] private ?string $image = null;   
    
    public function getEnchereId(): ?int
    {
        return $this->enchereId;
    }

    public function getIdclcreree(): ?string
    {
        return $this->idclcreree;
    }

    public function setIdclcreree(string $idclcreree): static
    {
        $this->idclcreree = $idclcreree;

        return $this;
    }

    public function getDateDebut(): ?string
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?string $dateDebut): static
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getHeured(): ?string
    {
        return $this->heured;
    }

    public function setHeured(string $heured): static
    {
        $this->heured = $heured;

        return $this;
    }

    public function getDateFin(): ?string
    {
        return $this->dateFin;
    }

    public function setDateFin(?string $dateFin): static
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getHeuref(): ?string
    {
        return $this->heuref;
    }

    public function setHeuref(string $heuref): static
    {
        $this->heuref = $heuref;

        return $this;
    }

    public function getMontantInitial(): ?string
    {
        return $this->montantInitial;
    }

    public function setMontantInitial(?string $montantInitial): static
    {
        $this->montantInitial = $montantInitial;

        return $this;
    }

    public function getNomEnchere(): ?string
    {
        return $this->nomEnchere;
    }

    public function setNomEnchere(string $nomEnchere): static
    {
        $this->nomEnchere = $nomEnchere;

        return $this;
    }

    public function getMontantFinal(): ?string
    {
        return $this->montantFinal;
    }

    public function setMontantFinal(?string $montantFinal): static
    {
        $this->montantFinal = $montantFinal;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getIdclenchere(): ?int
    {
        return $this->idclenchere;
    }

    public function setIdclenchere(?int $idclenchere): static
    {
        $this->idclenchere = $idclenchere;

        return $this;
    }


}
