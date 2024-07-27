<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Repository\RatingRepository;

#[ORM\Entity(repositoryClass: RatingRepository::class)]
class Rating
{
    #[ORM\Id]

    #[ORM\GeneratedValue]
    
    #[ORM\Column]
    
    private ?int $ratingId = null;
    
    #[ORM\Column  ] private ?int $ratingValue = null;   
    #[ORM\ManyToOne(inversedBy: 'Produit')] private ?Produit $product = null;
    #[ORM\ManyToOne(inversedBy: 'User')] private ?User $user = null;


    public function getRatingId(): ?int
    {
        return $this->ratingId;
    }

    public function getRatingValue(): ?int
    {
        return $this->ratingValue;
    }

    public function setRatingValue(?int $ratingValue): static
    {
        $this->ratingValue = $ratingValue;

        return $this;
    }

    public function getProduct(): ?Produit
    {
        return $this->product;
    }

    public function setProduct(?Produit $product): static
    {
        $this->product = $product;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }


}
