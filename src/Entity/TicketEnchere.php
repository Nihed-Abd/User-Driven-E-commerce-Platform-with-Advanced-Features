<?php

namespace App\Entity;

use Doctrine\DBAL\Types\DecimalType;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

use App\Repository\TicketEnchereRepository;

#[ORM\Entity(repositoryClass: TicketEnchereRepository::class)]
class TicketEnchere
{
    
    #[ORM\Id]

    #[ORM\GeneratedValue]
    
    #[ORM\Column]
    
    private ?int $ticketId = null;
    
    #[ORM\Column  ] private ?int $enchereId = null;   
    #[ORM\Column(type: "decimal")  ] private ?string $prix = null;   

    public function getTicketId(): ?int 
    {
        return $this->ticketId;
    }

    public function getEnchereId(): ?Enchere
    {
        return $this->enchereId;
    }

    public function setEnchereId(?Enchere $enchereId): static
    {
        $this->enchereId = $enchereId;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(?string $prix): static
    {
        $this->prix = $prix;

        return $this;
    }


}
