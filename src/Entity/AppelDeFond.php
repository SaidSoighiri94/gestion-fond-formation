<?php

namespace App\Entity;

use App\Repository\AppelDeFondRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppelDeFondRepository::class)]
class AppelDeFond
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idAppel = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $dateEmission = null;

    #[ORM\Column(nullable: true)]
    private ?float $montant = null;

    #[ORM\Column(nullable: true)]
    private ?bool $status = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $datePaiment = null;

    #[ORM\ManyToOne(inversedBy: 'appelDeFonds')]
    private ?projet $projet = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAppel(): ?int
    {
        return $this->idAppel;
    }

    public function setIdAppel(int $idAppel): static
    {
        $this->idAppel = $idAppel;

        return $this;
    }

    public function getDateEmission(): ?\DateTimeImmutable
    {
        return $this->dateEmission;
    }

    public function setDateEmission(?\DateTimeImmutable $dateEmission): static
    {
        $this->dateEmission = $dateEmission;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(?float $montant): static
    {
        $this->montant = $montant;

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

    public function getDatePaiment(): ?\DateTimeImmutable
    {
        return $this->datePaiment;
    }

    public function setDatePaiment(?\DateTimeImmutable $datePaiment): static
    {
        $this->datePaiment = $datePaiment;

        return $this;
    }

    public function getProjet(): ?projet
    {
        return $this->projet;
    }

    public function setProjet(?projet $projet): static
    {
        $this->projet = $projet;

        return $this;
    }
}
