<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use finfo;
use App\Repository\LivraisonRepository;
#[ORM\Entity(repositoryClass: LivraisonRepository::class)]
class Livraison
{
    #[ORM\Id]

    #[ORM\GeneratedValue]
    
    #[ORM\Column]
    
    private ?int $id = null; 
    #[ORM\Column (length: 255) ] private ?string $adresselivraison = null;   
    #[ORM\Column(type:"datetime")]
    private ?\DateTimeInterface $datecommande = null;
    #[ORM\Column(type:"datetime")]
    private ?\DateTimeInterface $datelivraison = null;
    #[ORM\Column (length: 255) ] private ?string $statuslivraison = null;   
    #[ORM\Column ] private ?float $latitude = null;   
    #[ORM\Column ] private ?float $longitude = null;   
    #[ORM\ManyToOne(inversedBy: 'Depot')] private ?Depot $iddepot = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresselivraison(): ?string
    {
        return $this->adresselivraison;
    }

    public function setAdresselivraison(string $adresselivraison): static
    {
        $this->adresselivraison = $adresselivraison;

        return $this;
    }

    public function getDatecommande(): ?\DateTimeInterface
    {
        return $this->datecommande;
    }

    public function setDatecommande(\DateTimeInterface $datecommande): static
    {
        $this->datecommande = $datecommande;

        return $this;
    }

    public function getDatelivraison(): ?\DateTimeInterface
    {
        return $this->datelivraison;
    }

    public function setDatelivraison(\DateTimeInterface $datelivraison): static
    {
        $this->datelivraison = $datelivraison;

        return $this;
    }

    public function getStatuslivraison(): ?string
    {
        return $this->statuslivraison;
    }

    public function setStatuslivraison(string $statuslivraison): static
    {
        $this->statuslivraison = $statuslivraison;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): static
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): static
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getIddepot(): ?Depot
    {
        return $this->iddepot;
    }

    public function setIddepot(?Depot $iddepot): static
    {
        $this->iddepot = $iddepot;

        return $this;
    }


}
