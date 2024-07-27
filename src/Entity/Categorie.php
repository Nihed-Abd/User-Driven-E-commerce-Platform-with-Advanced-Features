<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Repository\CategorieRepository;
#[ORM\Entity(repositoryClass: CategorieRepository::class)]

class Categorie
{
    #[ORM\Id]

    #[ORM\GeneratedValue]
    
    #[ORM\Column]
    
    private ?int $idC = null;
    #[ORM\Column (length: 255)] private ?string $nomC = null;   

    public function getIdC(): ?int
    {
        return $this->idC;
    }

    public function getNomC(): ?string
    {
        return $this->nomC;
    }

    public function setNomC(string $nomC): static
    {
        $this->nomC = $nomC;

        return $this;
    }


}
