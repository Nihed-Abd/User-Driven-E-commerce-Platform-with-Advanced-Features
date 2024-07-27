<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Repository\TicketpRepository;

#[ORM\Entity(repositoryClass: TicketpRepository::class)]
class Ticketp
{
 
    #[ORM\Id]

    #[ORM\GeneratedValue]
    
    #[ORM\Column]
    
    private ?int $ticketpId = null;
    #[ORM\Column  ] private ?int $ticketId = null;   
    #[ORM\Column  ] private ?int $clientId = null;   
    #[ORM\Column  ] private ?int $enchereId = null;   

    public function getTicketpId(): ?int
    {
        return $this->ticketpId;
    }

    public function getTicketId(): ?TicketEnchere
    {
        return $this->ticketId;
    }

    public function setTicketId(?int $ticketId): static
    {
        $this->ticketId = $ticketId;

        return $this;
    }

    public function getClientId(): ?User
    {
        return $this->clientId;
    }

    public function setClientId(?int $clientId): static
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function getEnchereId(): ?Enchere
    {
        return $this->enchereId;
    }

    public function setEnchereId(?int $enchereId): static
    {
        $this->enchereId = $enchereId;

        return $this;
    }


}
