<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Boolean;

use App\Repository\UserRepository;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
 
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null; 
    
    #[ORM\Column (length:255)]
    private ?string $email = null;   
    
    #[ORM\Column (length:255)]
    private ?string $nom = null;   
    
    #[ORM\Column (length:255)]
    private ?string $prenom = null;   

    #[ORM\Column (length:255)]
    private ?string $mdp = null; 

    #[ORM\Column (length:255)]
    private ?string $verificationcode = null;   
    
    #[ORM\Column (length:255)]
    private ?string $role = null;   

    #[ORM\Column (type:"boolean", nullable:true)]
    private ?bool $status = null;   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): static
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(?bool $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getVerificationcode(): ?string
    {
        return $this->verificationcode;
    }

    public function setVerificationcode(string $verificationcode): static
    {
        $this->verificationcode = $verificationcode;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function __toString(): string
    {
        return $this->nom . ' ' . $this->prenom;
    }
}
