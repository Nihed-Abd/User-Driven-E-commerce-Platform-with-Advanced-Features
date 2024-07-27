<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Repository\DepotRepository;
#[ORM\Entity(repositoryClass: DepotRepository::class)]
class Depot
{
    
    #[ORM\Id]

    #[ORM\GeneratedValue]
    
    #[ORM\Column]
    
    private ?int $iddepot = null;
    
    #[ORM\Column (length: 255)] private ?string $nomdepot = null;   

    #[ORM\Column (length: 255)] private ?string $adresse = null;   

    public function getIddepot(): ?int
    {
        return $this->iddepot;
    }

    public function getNomdepot(): ?string
    {
        return $this->nomdepot;
    }

    public function setNomdepot(string $nomdepot): static
    {
        $this->nomdepot = $nomdepot;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }


}
