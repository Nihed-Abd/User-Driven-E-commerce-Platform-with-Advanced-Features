<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Repository\PanierRepository;
#[ORM\Entity(repositoryClass: PanierRepository::class)]
class Panier
{
    
    #[ORM\Id]

    #[ORM\GeneratedValue]
    
    #[ORM\Column]
    
    private ?int $id = null;
    #[ORM\Column (length: 255) ] private ?string $nomArticle = null;   
    #[ORM\Column] private ?float $prix = null;   


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomArticle(): ?string
    {
        return $this->nomArticle;
    }

    public function setNomArticle(string $nomArticle): static
    {
        $this->nomArticle = $nomArticle;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }


}
