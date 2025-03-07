<?php

namespace App\Entity;

use App\Repository\CommissionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommissionRepository::class)]
class Commission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idCommission = null;

    #[ORM\Column]
    private ?int $typeCommision = null;

    #[ORM\Column(type:'datetime_immutable')]
    private ?\DateTimeImmutable $dateCommission = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCommission(): ?int
    {
        return $this->idCommission;
    }

    public function setIdCommission(int $idCommission): static
    {
        $this->idCommission = $idCommission;

        return $this;
    }

    public function getTypeCommision(): ?int
    {
        return $this->typeCommision;
    }

    public function setTypeCommision(int $typeCommision): static
    {
        $this->typeCommision = $typeCommision;

        return $this;
    }

    public function getDateCommission(): ?\DateTimeImmutable
    {
        return $this->dateCommission;
    }

    public function setDateCommission(\DateTimeImmutable $dateCommission): self
    {
        $this->dateCommission = $dateCommission;

        return $this;
    }
}
