<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Repositor\GrosmotsRepository;
#[ORM\Entity(repositoryClass: GrosmotsRepository::class)]
class Grosmots
{
    #[ORM\Id]

    #[ORM\GeneratedValue]
    
    #[ORM\Column]
    
    private ?int $idGm = null;
    
    #[ORM\Column (length: 255) ] private ?string $grosmots = null;   


    public function getIdGm(): ?int
    {
        return $this->idGm;
    }

    public function getGrosmots(): ?string
    {
        return $this->grosmots;
    }

    public function setGrosmots(string $grosmots): static
    {
        $this->grosmots = $grosmots;

        return $this;
    }


}
