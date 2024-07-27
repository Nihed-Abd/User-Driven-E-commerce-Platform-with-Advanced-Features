<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

use App\Repository\DiscountRepository;
#[ORM\Entity(repositoryClass: DiscountRepository::class)]
class Discount
{
    
    #[ORM\Id]

    #[ORM\GeneratedValue]
    
    #[ORM\Column]
    
    private ?int $idd = null;

    #[ORM\Column ] private ?int $userid = null;   

    #[ORM\Column ] private ?int $codepromoid = null;   



#[ORM\Column(type:"datetime")]
    private ?\DateTimeInterface $date = null;



    public function getIdd(): ?int
    {
        return $this->idd;
    }

    public function getUserid(): ?int
    {
        return $this->userid;
    }

    public function setUserid(int $userid): static
    {
        $this->userid = $userid;

        return $this;
    }

    public function getCodepromoid(): ?int
    {
        return $this->codepromoid;
    }

    public function setCodepromoid(int $codepromoid): static
    {
        $this->codepromoid = $codepromoid;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }


}
