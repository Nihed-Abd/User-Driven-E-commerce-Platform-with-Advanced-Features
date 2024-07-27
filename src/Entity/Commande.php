<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

use App\Repository\CommandeRepository;
#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]

    #[ORM\GeneratedValue]
    
    #[ORM\Column]
    
    private ?int $id = null;

    #[ORM\Column ] private ?int $etat = null;
    

    #[ORM\Column ] private ?int $cmdClient = null;

    #[ORM\Column(type:"datetime")]
    private ?\DateTimeInterface $cmdDate = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getCmdClient(): ?int
    {
        return $this->cmdClient;
    }

    public function setCmdClient(int $cmdClient): static
    {
        $this->cmdClient = $cmdClient;

        return $this;
    }

    public function getCmdDate(): ?\DateTimeInterface
    {
        return $this->cmdDate;
    }

    public function setCmdDate(\DateTimeInterface $cmdDate): static
    {
        $this->cmdDate = $cmdDate;

        return $this;
    }


}
