<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Integer;

use App\Repository\CategoriecodepromoRepository;
#[ORM\Entity(repositoryClass: CategoriecodepromoRepository::class)]
class Categoriecodepromo
{
    #[ORM\Id]

    #[ORM\GeneratedValue]
    
    #[ORM\Column]
    
    private ?int $idccp = null;
    
    #[ORM\Column (length: 255)] private ?string $code = null;   
    #[ORM\Column (length: 255)] private ?int $valeur = null;
    #[ORM\Column (length: 255)] private ?int $limite = null;


    public function getIdccp(): ?int
    {
        return $this->idccp;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getValeur(): ?int
    {
        return $this->valeur;
    }

    public function setValeur(int $valeur): static
    {
        $this->valeur = $valeur;

        return $this;
    }

    public function getLimite(): ?int
    {
        return $this->limite;
    }

    public function setLimite(int $limite): static
    {
        $this->limite = $limite;

        return $this;
    }


}
