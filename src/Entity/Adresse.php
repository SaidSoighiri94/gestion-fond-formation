<?php

namespace App\Entity;

use App\Repository\AdresseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdresseRepository::class)]
class Adresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idAdresse = null;

    #[ORM\Column(length: 6)]
    private ?string $noRue = null;

    #[ORM\Column(length: 50)]
    private ?string $rue = null;

    #[ORM\Column(length: 6)]
    private ?string $codePostal = null;

    #[ORM\Column(length: 35)]
    private ?string $ville = null;

    #[ORM\ManyToOne(inversedBy: 'adresses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?client $utilisateur = null;

    #[ORM\ManyToOne(inversedBy: 'adresses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?client $client = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAdresse(): ?int
    {
        return $this->idAdresse;
    }

    public function setIdAdresse(int $idAdresse): static
    {
        $this->idAdresse = $idAdresse;

        return $this;
    }

    public function getNoRue(): ?string
    {
        return $this->noRue;
    }

    public function setNoRue(string $noRue): static
    {
        $this->noRue = $noRue;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): static
    {
        $this->rue = $rue;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): static
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getUtilisateur(): ?client
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?client $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getClient(): ?client
    {
        return $this->client;
    }

    public function setClient(?client $client): static
    {
        $this->client = $client;

        return $this;
    }
}
